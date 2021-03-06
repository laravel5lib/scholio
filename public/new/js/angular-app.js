(function(window, document) {
    angular.module("landingApp", ['ui.bootstrap', 'algoliasearch', 'algolia.autocomplete']).controller("landCtrl", function($scope, $http, algolia) {
        $scope.over = false;
        $scope.over2 = false;
        $scope.over3 = false;

        $scope.overVenture = false;
        $scope.overThermi = false;
        $scope.overIdeatree = false;
        $scope.overEoe = false;


        $scope.role = null;
        $scope.active = function(role) {
            $scope.role = role;
        }
        var fetchTypes = function() {
            $http.get('api/school/types/all').success(function(data) {
                $scope.schoolTypes = data;
            });
        }
        fetchTypes();
        $scope.selectedButton = 2;
        var _selected;
        $scope.selected = 'all';
        $scope.ngModelOptionsSelected = function(value) {
            if (arguments.length) {
                _selected = value;
            } else {
                return _selected;
            }
        };
        $scope.modelOptions = {
            debounce: {
                default: 500,
                blur: 250
            },
            getterSetter: true
        };
        $scope.schoolTypess = []
        var st1 = $scope.schoolTypess
        var temp = JSON.stringify(st1).replace(/ά/g, "α").replace(/έ/g, "ε").replace(/ή/g, "η").replace(/ί/g, "ι").replace(/ό/g, "ο").replace(/ύ/g, "υ").replace(/ώ/g, "ω").replace(/type/g, "type2").replace(/tags/g, "tags2");
        var st2 = JSON.parse(temp);
        $scope.schoolTypess = angular.merge([], st2, st1);
        $scope.formatLabel = function(model) {
            for (var i = 0; i < $scope.schoolTypess.length; i++) {
                if (model === $scope.schoolTypess[i].id) {
                    console.log('ng-model=' + model)
                    return $scope.schoolTypess[i].type;
                }
            }
        }
        $scope.locationSelected = null
        $scope.getLocation = function(val) {
            return $http.get('/maps.googleapis.com/maps/api/geocode/json?components=country:GR', {
                params: {
                    language: 'el',
                    address: val,
                    sensor: false
                }
            }).then(function(response) {
                return response.data.results.map(function(item) {
                    return item.formatted_address;
                });
            });
        };
        $scope.result1 = '';
        $scope.options1 = {
            country: 'gr'
        };
        $scope.details1 = '';
        $scope.result2 = '';
        $scope.options2 = {
            country: 'gr',
            types: '(cities)'
        };
        $scope.details2 = '';
        $scope.input = ''
        var client = algolia.Client('N08SZYEUO0', 'e00bc4548ea05c691c81f7c30c100bd7');
        var schools = client.initIndex('dummySchools');
        var scholarships = client.initIndex('dummyScholarships');
        $scope.getDatasets1 = function() {
            return [{
                source: algolia.sources.hits(scholarships, {
                    hitsPerPage: 3
                }),
                displayKey: function(suggestion) {
                    return suggestion.school + ' - ' + suggestion.study;
                },
                templates: {
                    header: '<div class="aa-suggestions-category">' + lang.main.first.algolia.search.institutions + '</div>',
                    suggestion: function(suggestion) {
                        return '<a target="_blank" style="color: #888;" href="/scholarship/' + suggestion.scholarship_id + '"><span ng-show="false"><img src="' + suggestion.school_logo + '" height="30px" style="margin-right: 10px;">' + suggestion._highlightResult.school.value + ' - ' + suggestion._highlightResult.study.value + ' - ' + lang.seeder.criteria[suggestion.criteria_id] + '</span></a>';
                    },
                }
            }, ];
        };
        $scope.getDatasets2 = function() {
            return [{
                source: algolia.sources.hits(schools, {
                    hitsPerPage: 3
                }),
                displayKey: 'name',
                templates: {
                    header: '<div class="aa-suggestions-category">' + lang.main.first.algolia.search.institutions + '</div>',
                    suggestion: function(suggestion) {
                        return '<a style="color: #888;" href="/public/profile/' + suggestion.id + '"><span><img src="' + suggestion.logo + '" height="30px" style="margin-right: 10px;">' + suggestion._highlightResult.name.value + '</span></a>';
                    },
                    empty: '<div class="aa-empty">' + lang.main.first.algolia.search.results + '</div>'
                }
            }, ];
        };
        $scope.$on('autocomplete:selected', function(event, suggestion, dataset) {
            if (suggestion.email) {
                window.location = '/public/profile/' + suggestion.school_id;
            }
        });
    }).directive('ngAutocomplete', function($parse) {
        return {
            scope: {
                details: '=',
                ngAutocomplete: '=',
                options: '='
            },
            link: function(scope, element, attrs, model) {
                var opts
                var initOpts = function() {
                    opts = {}
                    if (scope.options) {
                        if (scope.options.types) {
                            opts.types = []
                            opts.types.push(scope.options.types)
                        }
                        if (scope.options.bounds) {
                            opts.bounds = scope.options.bounds
                        }
                        if (scope.options.country) {
                            opts.componentRestrictions = {
                                country: scope.options.country
                            }
                        }
                    }
                }
                initOpts()
                var newAutocomplete = function() {
                    scope.gPlace = new google.maps.places.Autocomplete(element[0], opts);
                    google.maps.event.addListener(scope.gPlace, 'place_changed', function() {
                        scope.$apply(function() {
                            scope.details = scope.gPlace.getPlace();
                            scope.ngAutocomplete = element.val();
                        });
                    })
                }
                newAutocomplete()
                scope.watchOptions = function() {
                    return scope.options
                };
                scope.$watch(scope.watchOptions, function() {
                    initOpts()
                    newAutocomplete()
                    element[0].value = '';
                    scope.ngAutocomplete = element.val();
                }, true);
            }
        };
    }).directive("scroll", function($window) {
        return function(scope, element, attrs) {
            angular.element($window).bind("scroll", function() {
                if (this.pageYOffset >= 430) {
                    $('#sec2').addClass('opacityFull');
                } else {}
                if (this.pageYOffset >= 950) {
                    $('#secNew').removeClass('right-out').addClass('right-in');
                }
            });
        };
    })
})(window, document);