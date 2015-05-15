(function () {
    "use strict";

    angular
        .module('angullery-admin')
        .controller('angulleryAdminController', adminController);

    function adminController($scope, $rootScope) {
        var vm        = this;
        vm.newGallery = newGallery;
        vm.addImage   = addImage;
        vm.hasImage   = hasImage;
        vm.getGallery = getGallery;
        vm.mainImage  = 'https://farm4.staticflickr.com/3261/2801924702_ffbdeda927_d.jpg';
        vm.gallery = [];
        var frame;

        $scope.$on('angullery:image:added', function() {
            debugger;
            vm.mainImage = vm.gallery[vm.gallery.length - 1];
            $scope.mainImage = vm.gallery[vm.gallery.length - 1];
        });

        function newGallery() {

            // If the media frame already exists, reopen it.
            if (frame) {
                frame.open();
                return;
            }

            // Create a new media frame
            frame = wp.media({
                title: 'Select or Upload Media Of Your Chosen Persuasion',
                button: {
                    text: 'Use this media'
                },
                multiple: false  // Set to true to allow multiple files to be selected
            });


            // When an image is selected in the media frame...
            frame.on('select', function() {

                // Get media attachment details from the frame state
                var attachment = frame.state().get('selection').first().toJSON();

                // Send the attachment URL to our custom image input field.

                vm.addImage(attachment);

                // Send the attachment id to our hidden input
                //imgIdInput.val( attachment.id );

            });

            frame.on('close', function() {
                //var selection = frame.state().get('selection');
                $rootScope.$broadcast('angullery:image:added');
            })

            // Finally, open the modal on click
            frame.open();
        }


        function addImage(image) {
            vm.mainImage = image.url;
            vm.gallery.push(image);
            debugger;
        }

        function hasImage() {
            return vm.gallery.length > 0;
        }

        function getGallery() {
            debugger;
            return vm.gallery;
            //return vm.gallery.toJSON();
        }

//            function mainImage() {
//               return vm.gallery[0];
//            }

    }
})();
