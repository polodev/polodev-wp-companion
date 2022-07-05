const mix = require('laravel-mix');
const fsExtra = require("fs-extra");

const archiver = require('archiver');

const path = require("path");
const cliColor = require("cli-color");
const emojic = require("emojic");
const wpPot = require('wp-pot');



if (process.env.NODE_ENV === 'scss') {

  mix.sass('frontend-resource/style.scss', 'assets/css/')
  .options({
    processCssUrls: false,
  })
  .webpackConfig({
    devtool: 'source-map',
    stats: {
      children: true
    }
    // this line actually we need
  })
  .sourceMaps()
  // .browserSync('bimafy.test')
  .disableNotifications();

}

if (process.env.NODE_ENV === 'pot') {
        let languages = path.resolve('languages');
        fsExtra.ensureDir(languages, function (err) {
            if (err) return console.error(err); // if file or folder does not exist
            wpPot({
                package: 'polodev-wp-companion',
                bugReport: '',
                src: '**/*.php',
                domain: 'polodev-wp-companion',
                destFile: `languages/polodev-wp-companion.pot`
            });
        });

}


if (process.env.NODE_ENV === 'package') {
  mix.then(function () {
      let bundledir = path.basename(path.resolve(__dirname));
      let copyfrom = path.resolve(__dirname);
      let copyto = path.resolve(`${bundledir}`);
      // Select All file then paste on list
      let includes = [
                  'assets',
                  'elementor',
                  'inc',
                  'languages',
                  'polodev-wp-companion.php',
                  ];
      fsExtra.ensureDir(copyto, function (err) {
          if (err) return console.error(err); // if file or folder does not exist
          includes.map(include => {
              fsExtra.copy(`${copyfrom}/${include}`, `${copyto}/${include}`, function (err) {
                  if (err) return console.error(err)
                  console.log(cliColor.white(`=> ${emojic.smiley}  ${include} copied...`));
              })
          });
          console.log(cliColor.white(`=> ${emojic.whiteCheckMark}  Build directory created`));
      });
  });

}

if (process.env.NODE_ENV === 'zip') {
  var bundledir = path.basename(path.resolve(__dirname)); // just for getting name
  let copyto = path.resolve(`${bundledir}`);


  var output = fsExtra.createWriteStream(__dirname + '/polodev-wp-companion.zip'); // output location

  var archive = archiver('zip', {
    zlib: { level: 9 } // Sets the compression level.
  });

    output.on('close', function() {
      console.log(archive.pointer() + ' total bytes');
      console.log('archiver has been finalized and the output file descriptor has closed.');

      // following function for deleting bundle
      fsExtra.remove(copyto, function () {
        console.log('deleted');
      });

    });

    output.on('end', function() {
      console.log('Data has been drained');
    });

    // good practice to catch warnings (ie stat failures and other non-blocking errors)
    archive.on('warning', function(err) {
      if (err.code === 'ENOENT') {
        // log warning
        console.log('warning')
      } else {
        console.log('error')
        throw err;
      }
    });

    // good practice to catch this error explicitly
    archive.on('error', function(err) {
      throw err;
    });

    // pipe archive data to the file
    archive.pipe(output);


    // append files from a glob pattern
    archive.directory(bundledir);  // just foldername + /*

    // finalize the archive (ie we are done appending files but streams have to finish yet)
    // 'close', 'end' or 'finish' may be fired right after calling this method so register to them beforehand
    archive.finalize();

}
