/**
 * Created by Freed on 2017/5/8.
 * E-mail:flyxz@126.com.
 * GitHub:FreedGo@github.com.
 */

var gulp      = require('gulp');
var scp       = require('gulp-scp2');//上传到服务器，相当于全部文档全部复制
var rsync     = require('gulp-rsync');//同步到服务器，相当于把修改后的文件同步到服务器；性能更好
var uglify    = require('gulp-uglify');//获取 uglify 模块（用于压缩 JS）;
var minifyCSS = require('gulp-minify-css');//gulp-minify-css用于压缩CSS;
// var cssnano   = require('gulp-cssnano');
var rename    = require('gulp-rename');//gulp-rename 用于重命名
var scpConfig = {//上传服务器配置
	host: '120.76.25.118',
	username: 'root',
	password: ''
	// dest: '/alidata/www/yishipi/skin/default'
};

/**
 * 启动压缩js并输出到dist/js
 */
gulp.task('js', function() {
	// 1. 找到文件
	gulp.src('./js/*.js')
	// 2. 压缩文件
		.pipe(uglify())
		.pipe(rename(function (path) {
			path.basename += ".min";//所有的文件都添加.min.js后缀
		}))
		// 3. 另存压缩后的文件
		.pipe(gulp.dest('./dist/js'))
});

/**
 * 启动压缩css并输出到dist/css
 */
gulp.task('css', function () {
	// 1. 找到文件
	gulp.src('./css/*.css')
	// 2. 压缩文件
		.pipe(minifyCSS())
		.pipe(rename(function (path) {
			path.basename += ".min";//所有的文件都添加.min.js后缀
		}))
		// 3. 另存为压缩文件
		.pipe(gulp.dest('./dist/css'))
});

/**
 * 监听js修改，并上传服务器
 */
gulp.task('watchjs', function () {
	// 监听文件修改，当文件被修改则执行 js，css 任务
	gulp.watch('./js/*.js',function (e) {
		gulp.src(e.path)
			// 2. 压缩文件
			.pipe(uglify())
			// 3. 重命名文件
			.pipe(rename(function (path) {
				path.basename += ".min";//所有的文件都添加.min.js后缀
			}))
			// 4. 另存压缩后的文件
			.pipe(gulp.dest('./dist/js'))
			// 5.上传到服务器指定目录
			.pipe(scp({
					host: scpConfig.host,
					username: scpConfig.username,
					password: scpConfig.password,
					dest: '/alidata/www/yishipi/skin/default/js'
					}
				)).on('error', function(err) {
					console.log(err);
				})

			})
});

/**
 * 监听js/css修改，并上传服务器
 */
gulp.task('watchAll', function () {
	// 监听文件修改，当文件被修改则执行 js，css 任务
	gulp.watch('./js/*.js',function (e) {
		gulp.src(e.path)
		// 2. 压缩文件
			.pipe(uglify())
			// 3. 重命名文件
			.pipe(rename(function (path) {
				path.basename += ".min";//所有的文件都添加.min.js后缀
			}))
			// 4. 另存压缩后的文件
			.pipe(gulp.dest('./dist/js'))
			// 5.上传到服务器指定目录
			.pipe(scp({
                host: scpConfig.host,
                username: scpConfig.username,
                password: scpConfig.password,
				dest: '/alidata/www/yishipi/skin/member/dist/js'
			})).on('error', function(err) {
			console.log(err);
		})

	});
	gulp.watch('./css/*.css',function (e) {
		gulp.src(e.path)
		// 2. 压缩文件
			.pipe(minifyCSS())
			// 3. 重命名文件
			.pipe(rename(function (path) {
				path.basename += ".min";//所有的文件都添加.min.js后缀
			}))
			// 4. 另存压缩后的文件
			.pipe(gulp.dest('./dist/css'))
			// 5.上传到服务器指定目录
			.pipe(scp({
                host: scpConfig.host,
                username: scpConfig.username,
                password: scpConfig.password,
				dest: '/alidata/www/yishipi/skin/member/dist/css'
			})).on('error', function(err) {
			console.log(err);
		})

	})
});

/**
 * 上传dist文件夹到服务器对应目录
 */
gulp.task('up', function () {
	gulp.src('./dist')
		.pipe(scp(scpConfig))
		.on('error', function(err) {
			console.log(err);
		});
});