var gulp = require('gulp');
var elixir = require('laravel-elixir');
var rename = require("gulp-rename");

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

 gulp.task("copyfiles", function(){
 	gulp.src("vendor/bower_dl/jquery/dist/jquery.js")
 	.pipe(gulp.dest("resources/assets/js"));

 	gulp.src("vendor/bower_dl/bootstrap/less/**")
 	.pipe(gulp.dest("resources/assets/less/bootstrap"));

 	gulp.src("vendor/bower_dl/bootstrap/dist/js/bootstrap.js")
 	.pipe(gulp.dest("resources/assets/js"));

 	gulp.src("vendor/bower_dl/bootstrap/dist/fonts/**")
 	.pipe(gulp.dest("public/assets/fonts"));

 	gulp.src("vendor/bower_dl/font-awesome/less/**")
 	.pipe(gulp.dest("resources/assets/less/fontawesome"));

 	gulp.src("vendor/bower_dl/font-awesome/fonts/**")
 	.pipe(gulp.dest("public/assets/fonts"));

 	gulp.src("vendor/bower_dl/selectize/dist/css/**")
 	.pipe(gulp.dest("public/assets/selectize/css"));

 	gulp.src("vendor/bower_dl/selectize/dist/js/standalone/selectize.min.js")
 	.pipe(gulp.dest("public/assets/selectize"));

 	gulp.src("vendor/bower_dl/pickadate/lib/compressed/themes/**")
 	.pipe(gulp.dest("public/assets/pickadate/themes"));

 	gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.js")
 	.pipe(gulp.dest("public/assets/pickadate/"));

 	gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.date.js")
 	.pipe(gulp.dest("public/assets/pickadate/"));

 	gulp.src("vendor/bower_dl/pickadate/lib/compressed/picker.time.js")
 	.pipe(gulp.dest("public/assets/pickadate/"));

 	gulp.src("vendor/bower_dl/clean-blog/less/**")
 	.pipe(gulp.dest("resources/assets/less/clean-blog"));


 });


 elixir(function(mix){
 	mix.scripts([
 		'js/bootstrap.js',
 		],
 		'public/assets/js/admin.js',
 		'resources/assets');
 	mix.less('admin.less', 'public/assets/css/admin.css');
 	mix.scripts([
'js/jquery.js',
'js/bootstrap.js',
'js/blog.js'
 		], 'public/assets/js/blog.js', 'resources//assets');

 	//mix.less('admin.less', 'public/assets/css/admin.css');
 	mix.less('blog.less', 'public/assets/css/blog.css');
 });
