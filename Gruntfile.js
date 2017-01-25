 module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg :   grunt.file.readJSON( '../package.json' ),
        copy: {
            main: {
                files:[
                    {
                        expand: false,
                        cwd: './',
                        src: 'context-bootstrap.php',
                        dest: '../<%= pkg.namespace %>-bootstrap.php'
                    },
                    {
                        expand: false,
                        cwd: './',
                        src: 'context.php',
                        dest: '../<%= pkg.namespace %>.php'
                    },
                    {
                        expand: true,
                        cwd: 'includes',
                        src: '**',
                        dest: '../includes/'
                    },
                    {
                        expand: true,
                        cwd: 'classes/',
                        src: '**',
                        dest: '../classes/'
                    }
                ]
            }
        },
        rename: {
            core: {
                src: '../classes/class-context-core.php',
                dest: '../classes/class-<%= pkg.slug %>.php'
            }
        },
        uglify: {
            min: {
                files: grunt.file.expandMapping( [
                    'assets/js/*.js',
                    '!assets/js/*.min.js',
                    '!assets/js/*.min-latest.js'
                ], '../assets/js/', {
                    rename : function ( destBase, destPath ) {
                        return destBase + destPath.replace( '.js', '.min.js' );
                    },
                    flatten: true
                } )
            }
        },
        cssmin: {
            options: {
                keepSpecialComments: 0
            },
            minify : {
                expand: true,
                cwd   : '../assets/css/',
                src   : ['*.css', '!*.min.css'],
                dest  : '../assets/css/',
                ext   : '.min.css'
            }
        },
        clean: {
            build: ["etc/**", "node_modules/**",".git/**",".gitignore","composer.json","Gruntfile.js","package.json"],
        },

    });

     //load modules
     grunt.loadNpmTasks( 'grunt-curl' );
     grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
     grunt.loadNpmTasks( 'grunt-contrib-uglify' );
     grunt.loadNpmTasks( 'grunt-contrib-copy' );
     grunt.loadNpmTasks( 'grunt-contrib-clean' );
     grunt.loadNpmTasks( 'grunt-rename' );
     //installer tasks
     grunt.registerTask( 'default', [ 'copy', 'rename', 'cssmin', 'uglify', 'clean' ] );

 };
