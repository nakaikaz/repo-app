module.exports = function(grunt){
    grunt.initConfig({
        less: {
            development: {
                options: {
                    paths: ['less']
                },
                files: {
                    'css/style.css': ['src/less/*.less', 'src/less/*/*.less']
                }
            }
        },
        concat: {
            files: {
                src: ['src/js/*.js', 'src/js/*/*.js'],
                dest: 'js/script.js'
            }
        },
        watch: {
            less: {
                files: ['src/less/*.less', 'src/less/*/*.less'],
                tasks: ['less']
            },
            js: {
                files: 'src/js/*/*.js',
                tasks: ['concat']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['less', 'concat', 'watch']);
}
