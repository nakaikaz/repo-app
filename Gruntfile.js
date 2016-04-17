module.exports = function(grunt){
    grunt.initConfig({
        less: {
            development: {
                options: {
                    paths: ["less"]
                },
                files: {
                    "css/style.css": ["less/*.less", "less/*/*.less"]
                }
            }
        },
        watch: {
            less: {
                files: ['./less/*.less', 'less/*/*.less'],
                tasks: ['less']
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-less');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.registerTask('default', ['less', 'watch']);
}
