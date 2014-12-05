module.exports = function(grunt){
	grunt.initConfig({
		pkg:grunt.file.readJSON('package.json'),
		autoprefixer: {
			dist: {
				files: {
					'modules/cms/media/css/style.css':'modules/cms/media/css/style.css'
				}
			}
		},
		sass:{
			dist:{
				options:{
					style:'compressed'
				},
				files:{
					'modules/cms/media/css/style.css':'modules/cms/media/sass/style.scss'
				}
			}
		},
		watch: {
			css: {
				files: ['modules/cms/media/sass/*.scss', 'modules/cms/media/sass/*/*.scss', 'modules/cms/media/sass/*/*/*.scss'],
				tasks: ['sass', 'autoprefixer']
			}
		}
	});
	grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.registerTask('default', ['sass']);
	//grunt.registerTask('default', ['watch']);
};

