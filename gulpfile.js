'use strict';

const {src, dest, watch} = require('gulp'),
    browserSync = require('browser-sync').create();

// Static server
function bs() {
    browserSync.init({
        server: {
            baseDir: "./src/"
        }
    });
    watch("./src/*.html").on('change', browserSync.reload);
    watch("./src/*.html").on('change', browserSync.reload);
    watch("./src/js/*.js").on('change', browserSync.reload);
}


exports.serve = bs;