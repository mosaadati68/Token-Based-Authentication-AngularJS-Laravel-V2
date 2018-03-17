myApp.controller('galleryController', [
    '$scope', '$location', 'galleryModel', '$timeout', '$routeParams', 'Lightbox',
    function ($scope, $location, galleryModel, $timeout, $routeParams, Lightbox) {

        galleryModel.getAllGalleries().then(function (response) {
            $timeout(function () {
                $scope.galleries = response.data;
                $scope.showGalleries = true;
            }, 1000);
        });

        if ($routeParams.id) {
            galleryModel.getGalleryById($routeParams.id).then(function (response) {
                $timeout(function () {
                    $scope.singleGallery = response.data;
                    console.log(response.data);
                    $scope.showGalleries = true;
                }, 1000);
            });
        }

        angular.extend($scope, {
            newGallery: {},
            errorDiv: false,
            errorMessages: [],
            addRemoveLinks: true,
            singleGallery: {},
            dropzoneConfig: {
                'options': { // passed into the Dropzone constructor
                    'url': baseUrl + 'upload-file'
                },
                'eventHandlers': {
                    'sending': function (file, xhr, formData) {
                        console.log('Sending');
                        formData.append('_token', csrfToken)
                        formData.append('galleryId', $routeParams.id);
                    },
                    'success': function (file, response) {
                        console.log('Success');
                        console.log(response);
                    }
                }
            }
        });

        angular.extend($scope, {
            newGallery: {},
            errorDiv: false,
            errorMessages: []
        });

        angular.extend($scope, {
            saveNewGallery: function (addGalleryForm) {
                if (addGalleryForm.$valid) {
                    $scope.formSubmitted = false;
                    galleryModel.saveGallery($scope.newGallery).then(function (response) {
                        $location.path('/gallery/view');
                    });
                } else {
                    $scope.formSubmitted = true;
                    console.log('Error');
                }
            },

            viewGallery: function (id) {
                $location.path('/gallery/view/' + ' ' + id);
            },

            openLightboxModel: function (index) {
                Lightbox.openModal($scope.singleGallery.images, index);
            }
        });
    }]);