import Dropzone from 'dropzone';
import ProgressBar from 'progressbar.js';

$("#images-upload").dropzone({
    url: "/uploadcar",
    thumbnailWidth: 50,
    thumbnailHeight: 50,
    previewTemplate: document.querySelector('#tpl').innerHTML,
    addRemoveLinks: true,
    autoProcessQueue: false,
    uploadprogress: function (file, progress, bytesSent) {
        $('.dz-progress').width(progress);
    }
});

var progressBar = new ProgressBar.Circle('#container', {
    strokeWidth: 2
});
progressBar.animate(1, {
    duration: 2000
}, function() {
    console.log('Animation has finished');
});



