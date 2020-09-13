(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\HomeController@index"},{"host":null,"methods":["POST"],"uri":"order","name":"order","action":"App\Http\Controllers\HomeController@makeOrder"},{"host":null,"methods":["POST"],"uri":"comment","name":"comment","action":"App\Http\Controllers\HomeController@addComment"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/login","name":"admin.login.show","action":"App\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/logout","name":"admin.logout","action":"App\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["POST"],"uri":"admin\/login","name":"admin.login.post","action":"App\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/user","name":"admin.user.index","action":"App\Http\Controllers\Admin\UserController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/user\/all","name":"admin.user.all","action":"App\Http\Controllers\Admin\UserController@getAll"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/user\/create","name":"admin.user.create","action":"App\Http\Controllers\Admin\UserController@create"},{"host":null,"methods":["POST"],"uri":"admin\/user","name":"admin.user.store","action":"App\Http\Controllers\Admin\UserController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/user\/{user}\/edit","name":"admin.user.edit","action":"App\Http\Controllers\Admin\UserController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/user\/{user}","name":"admin.user.update","action":"App\Http\Controllers\Admin\UserController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/user\/{user}","name":"admin.user.get","action":"App\Http\Controllers\Admin\UserController@get"},{"host":null,"methods":["DELETE"],"uri":"admin\/user\/{user}","name":"admin.user.delete","action":"App\Http\Controllers\Admin\UserController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/order","name":"admin.order.index","action":"App\Http\Controllers\Admin\OrderController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/order\/all","name":"admin.order.all","action":"App\Http\Controllers\Admin\OrderController@getAll"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/order\/create","name":"admin.order.create","action":"App\Http\Controllers\Admin\OrderController@create"},{"host":null,"methods":["POST"],"uri":"admin\/order","name":"admin.order.store","action":"App\Http\Controllers\Admin\OrderController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/order\/{order}\/edit","name":"admin.order.edit","action":"App\Http\Controllers\Admin\OrderController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/order\/{order}","name":"admin.order.update","action":"App\Http\Controllers\Admin\OrderController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/order\/{order}","name":"admin.order.get","action":"App\Http\Controllers\Admin\OrderController@get"},{"host":null,"methods":["DELETE"],"uri":"admin\/order\/{order}","name":"admin.order.delete","action":"App\Http\Controllers\Admin\OrderController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/comment","name":"admin.comment.index","action":"App\Http\Controllers\Admin\CommentController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/comment\/all","name":"admin.comment.all","action":"App\Http\Controllers\Admin\CommentController@getAll"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/comment\/create","name":"admin.comment.create","action":"App\Http\Controllers\Admin\CommentController@create"},{"host":null,"methods":["POST"],"uri":"admin\/comment","name":"admin.comment.store","action":"App\Http\Controllers\Admin\CommentController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/comment\/{comment}\/edit","name":"admin.comment.edit","action":"App\Http\Controllers\Admin\CommentController@edit"},{"host":null,"methods":["PATCH"],"uri":"admin\/comment\/{comment}","name":"admin.comment.update","action":"App\Http\Controllers\Admin\CommentController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/comment\/{comment}","name":"admin.comment.get","action":"App\Http\Controllers\Admin\CommentController@get"},{"host":null,"methods":["DELETE"],"uri":"admin\/comment\/{comment}","name":"admin.comment.delete","action":"App\Http\Controllers\Admin\CommentController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/notification","name":"admin.notification.index","action":"App\Http\Controllers\Admin\NotificationController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/notification\/all","name":"admin.notification.all","action":"App\Http\Controllers\Admin\NotificationController@getAll"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/notification\/{notification}\/view","name":"admin.notification.view","action":"App\Http\Controllers\Admin\NotificationController@view"},{"host":null,"methods":["DELETE"],"uri":"admin\/notification\/{notification}","name":"admin.notification.delete","action":"App\Http\Controllers\Admin\NotificationController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/setting","name":"admin.setting.index","action":"App\Http\Controllers\Admin\SettingController@index"},{"host":null,"methods":["POST"],"uri":"admin\/setting","name":"admin.setting.store","action":"App\Http\Controllers\Admin\SettingController@store"},{"host":null,"methods":["POST"],"uri":"admin\/setting\/modify","name":"admin.setting.modify","action":"App\Http\Controllers\Admin\SettingController@modify"},{"host":null,"methods":["PATCH"],"uri":"admin\/setting\/{setting}","name":"admin.setting.update","action":"App\Http\Controllers\Admin\SettingController@update"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // Router.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // Router.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // Router.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // Router.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // Router.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // Router.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.Router = laroute;
    }

}).call(this);

