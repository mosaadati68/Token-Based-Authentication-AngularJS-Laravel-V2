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
                    // console.log(response.data);
                    $scope.showGalleries = true;
                }, 1000);
            });
        }

        $scope.$on('imageAdded', function (event, args) {
            $scope.singleGallery = args;
            $scope.$apply();
        });

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
                        formData.append('_token', csrfToken)
                        formData.append('galleryId', $routeParams.id);
                    },
                    'success': function (file, response) {
                        $scope.singleGallery.images.push(response);
                        $scope.$emit('imageAdded', $scope.singleGallery);
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
                $location.path('/gallery/view/' + id);
            },

            openLightboxModel: function (index) {
                Lightbox.openModal($scope.singleGallery.images, index);
            },
            deleteImage: function (imageId) {
                data = {
                    imageId: imageId,
                    galleryId: $routeParams.id
                };

                galleryModel.deleteSingleImage(data).then(function (response) {
                    $scope.singleGallery = response.data;
                    console.log('gdg');
                });
            }
        });
    }]);