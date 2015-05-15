(function () {
    "use strict";

    angular
        .module('angullery-admin')
        .controller('AngulleryAdminController', adminController);

    function adminController($scope, $rootScope) {
        var vm        = this;
        $scope.newGallery = newGallery;
        $scope.addImage   = addImage;
        $scope.hasImage   = hasImage;
        $scope.getGallery = getGallery;
        $scope.mainImage  = 'https://farm4.staticflickr.com/3261/2801924702_ffbdeda927_d.jpg';
        $scope.gallery    = [];
        $scope.galleryJson = '';

        var frame;

        $scope.$on('angullery:image:added', function(event, message) {
            $scope.addImage(message.attachment);
            $scope.mainImage = $scope.gallery[$scope.gallery.length - 1].url;
            $scope.galleryJson = JSON.stringify($scope.gallery);
            //$scope.mainImage = vm.gallery[vm.gallery.length - 1].url;
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

                $rootScope.$broadcast('angullery:image:added', {'attachment': attachment});
                // Send the attachment id to our hidden input
                //imgIdInput.val( attachment.id );

            });

            // Finally, open the modal on click
            frame.open();
        }

        function addImage(image) {
           $scope.gallery.push(image);
        }

        function hasImage() {
            return $scope.gallery.length > 0;
        }

        function getGallery() {
            return $scope.gallery;
        }
    }
})();
