var ThemehunkLibraryAjaxQueue = (function() {
	var requests = [];

	return {

		/**
		 * Add AJAX request
		 *
		 * @since 1.0.0
		 */
		add:  function(opt) {
		    requests.push(opt);
		},

		/**
		 * Remove AJAX request
		 *
		 * @since 1.0.0
		 */
		remove:  function(opt) {
		    if( jQuery.inArray(opt, requests) > -1 )
		        requests.splice($.inArray(opt, requests), 1);
		},

		/**
		 * Run / Process AJAX request
		 *
		 * @since 1.0.0
		 */
		run: function() {
		    var self = this,
		        oriSuc;

		    if( requests.length ) {
		        oriSuc = requests[0].complete;

		        requests[0].complete = function() {
		             if( typeof(oriSuc) === 'function' ) oriSuc();
		             requests.shift();
		             self.run.apply(self, []);
		        };

		        jQuery.ajax(requests[0]);

		    } else {

		      self.tid = setTimeout(function() {
		         self.run.apply(self, []);
		      }, 1000);
		    }
		},

		/**
		 * Stop AJAX request
		 *
		 * @since 1.0.0
		 */
		stop:  function() {

		    requests = [];
		    clearTimeout(this.tid);
		}
	};

}());


(function($){

var ThemehunkSSEImport = {
		complete: {
			posts: 0,
			media: 0,
			users: 0,
			comments: 0,
			terms: 0,
		},

		updateDelta: function (type, delta) {
			this.complete[ type ] += delta;

			var self = this;
			requestAnimationFrame(function () {
				self.render();
			});
		},
		updateProgress: function ( type, complete, total ) {
			var text = complete + '/' + total;

			if( 'undefined' !== type && 'undefined' !== text ) {
				total = parseInt( total, 10 );
				if ( 0 === total || isNaN( total ) ) {
					total = 1;
				}
				var percent = parseInt( complete, 10 ) / total;
				var progress     = Math.round( percent * 100 ) + '%';
				var progress_bar = percent * 100;
			}
		},
		render: function () {
			var types = Object.keys( this.complete );
			var complete = 0;
			var total = 0;

			for (var i = types.length - 1; i >= 0; i--) {
				var type = types[i];
				this.updateProgress( type, this.complete[ type ], this.data.count[ type ] );

				complete += this.complete[ type ];
				total += this.data.count[ type ];
			}

			this.updateProgress( 'total', complete, total );
		}
	};



	ThemehunkTemplateAdmin = {

		log_file        : '',
		customizer_data : '',
		xml_url         : '',
		options_data    : '',
		widgets_data    : '',


		init: function(){
			this._getJsonData();
			this._bind();
		},

		_getJsonData: function(cate ='all',builder =''){
			$('.spinner-wrap').addClass('loading').html('<span class="spinner is-active"></span>');
				var data = {
						'action': 'themehunk_library_json',
						'cate' : cate,
						'builder' : builder
					};
			 	$.ajax({
			 		dataType: "json",
			        url: themehunkAdmin.ajax_url,
			        type: 'POST',
			        data: data,
			 
			        success: function( success ) {



			        	ThemehunkTemplateAdmin._filterJson(success);
			        	jQuery('#themehunk-site-library').show();

			        if(builder==''){
						var template = wp.template( 'themehunk-list-template' );
						$("#th-demo-list").html( template( success ) );
						[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
						new SelectFx(el);
						} );
					}

			        },
			        error: function( error ) {
			            console.log( error );
			        }
			    });
		},

		_filterJson: function(tmplData){
			ThemehunkTemplateAdmin._addCategory(tmplData.cate);
			$('.select-page-builder').hide();
			 	//var templateData =  $.parseJSON(success);
				var template = wp.template( 'themehunk-template' );

				$("#themehunk-site-library").html( template( tmplData ) );
					ThemehunkTemplateAdmin._demoClick();
				jQuery('.spinner-wrap').removeClass('loading').html('');

		},
		// show demo category
		_addCategory:function(cate){
			var cateList = '<ul class="filter-links themehunk-category">';
			$.each(cate, function(k, v) {
				cateList += '<li><a href="#" data-cate="'+k+'">'+v+'</a></li>';
				});
			cateList += '</ul>';
		$("#themehunk-site-library-category").html(cateList);
		},

		// show category demo
	  _builderDemo:function(event){
	  			jQuery('#themehunk-site-library').hide();
	  			event.preventDefault();
	  			var builderName = $(this).data('value');
				var $cate_slug 	= jQuery( event.target );
				ThemehunkTemplateAdmin._getJsonData($cate_slug.data('cate'),builderName);
		},

		// show category demo
	  	_categoryDemo:function(event){
	  			jQuery('#themehunk-site-library').hide();
	  			event.preventDefault();
	  			var builderName = $('.zsl-demo-type ul li.cs-selected').data('value');
				var $cate_slug 	= jQuery( event.target );
				ThemehunkTemplateAdmin._getJsonData($cate_slug.data('cate'),builderName);
		},

		_overlayclose: function(){
		$('.wp-full-overlay').hide();
		},
	/**
		 * Remove plugin from the queue.
		 */
		_removePluginFromQueue: function( removeItem, pluginsList ) {
			 return $.grep(pluginsList, function( value ) {
			 	return value.slug != removeItem;
			 });
		},

	_checkPlugins: function(requiredPlugins,demo_type=''){
		if( $.isArray( requiredPlugins ) ) {

			var $pluginsFilter    = jQuery( '#plugin-filter' ),
				data 			= {
										action           : 'themehunk-plugins-check',
										_ajax_nonce      : themehunkAdmin.themehunk_ajax_nonce,
										required_plugins : requiredPlugins
									};
			 	$.ajax({
			        url: 	themehunkAdmin.ajax_url,
			        type: 	'POST',
			        data:	data,
			        fail:function( jqXHR ){

					// Remove loader.
					jQuery('.required-plugins').removeClass('loading').html('');

					ThemehunkTemplateAdmin._importFailMessage( jqXHR.status + ' ' + jqXHR.responseText, 'plugins' );
					},
			        success: function( success ) {
							console.log(success);	

							// Release disabled class from import button.
					$('.themehunk-demo-import')
						.removeClass('disabled not-click-able')
						.attr('data-import', 'disabled');
					// Remove loader.
					jQuery('.required-plugins').removeClass('loading').html('');


						/**
					 * Count remaining plugins.
					 * @type number
					 */
					var remaining_plugins = 0;


					/**
					 * Not Installed
					 *
					 * List of not installed required plugins.
					 */
					if ( typeof success.data.notinstalled !== 'undefined' ) {

						// Add not have installed plugins count.
						remaining_plugins += parseInt( success.data.notinstalled.length );

						jQuery( success.data.notinstalled ).each(function( index, plugin ) {

							var output  = '<div class="plugin-card ';
								output += ' 		plugin-card-'+plugin.slug+'"';
								output += ' 		data-slug="'+plugin.slug+'"';
								output += ' 		data-init="'+plugin.init+'">';
								output += '	<span class="title">'+plugin.name+'</span>';
								output += '	<button class="button install-now"';
								output += '			data-init="' + plugin.init + '"';
								output += '			data-slug="' + plugin.slug + '"';
								output += '			data-name="' + plugin.name + '">';
								output += 	'Install Now'; //wp.updates.l10n.installNow
								output += '	</button>';
								 output += '	<span class="dashicons-no dashicons"></span>';
								output += '</div>';

							jQuery('.required-plugins').append(output);

						});
					}


					/**
					 * Inactive
					 *
					 * List of not inactive required plugins.
					 */
					if ( typeof success.data.inactive !== 'undefined' ) {

						// Add inactive plugins count.
						remaining_plugins += parseInt( success.data.inactive.length );

						jQuery( success.data.inactive ).each(function( index, plugin ) {
							var output  = '<div class="plugin-card ';
								output += ' 		plugin-card-'+plugin.slug+'"';
								output += ' 		data-slug="'+plugin.slug+'"';
								output += ' 		data-init="'+plugin.init+'">';
								output += '	<span class="title">'+plugin.name+'</span>';
								output += '	<button class="button activate-now button-primary"';
								output += '		data-init="' + plugin.init + '"';
								output += '		data-slug="' + plugin.slug + '"';
								output += '		data-name="' + plugin.name + '">';
								output += 	'Activate'; //wp.updates.l10n.activatePlugin;
								output += '	</button>';
								// output += '	<span class="dashicons-no dashicons"></span>';
								output += '</div>';
							jQuery('.required-plugins').append(output);
						});
					}


					/**
					 * Active
					 *
					 * List of not active required plugins.
					 */
					if ( typeof success.data.active !== 'undefined' ) {

						jQuery( success.data.active ).each(function( index, plugin ) {

							var output  = '<div class="plugin-card ';
								output += ' 		plugin-card-'+plugin.slug+'"';
								output += ' 		data-slug="'+plugin.slug+'"';
								output += ' 		data-init="'+plugin.init+'">';
								output += '	<span class="title">'+plugin.name+'</span>';
								output += '	<button class="button disabled"';
								output += '			data-slug="' + plugin.slug + '"';
								output += '			data-name="' + plugin.name + '">';
								output += themehunkAdmin.unique.pluginActive;
								output += '	</button>';
								// output += '	<span class="dashicons-yes dashicons"></span>';
								output += '</div>';

							jQuery('.required-plugins').append(output);
						});
					}
					/**
					 * Enable Demo Import Button
					 * @type number
					 */
					themehunkAdmin.requiredPlugins = success.data;
					ThemehunkTemplateAdmin._enable_demo_import_button(demo_type);
	
			        },
			        error: function( error ) {
			            console.log( error );
			        }
			    });
		} else{
				// Enable Demo Import Button
				ThemehunkTemplateAdmin._enable_demo_import_button( demo_type );
				jQuery('.required-plugins-wrap').remove();
			 }
	},
		/**
		 * Enable Demo Import Button.
		 */
		_enable_demo_import_button: function( type ) {
			type = ( undefined !== type ) ? type : 'free';
			switch( type ) {

				case 'free':
							var all_buttons      = parseInt( jQuery( '.plugin-card .button' ).length ) || 0,
								disabled_buttons = parseInt( jQuery( '.plugin-card .button.disabled' ).length ) || 0;

							if( all_buttons === disabled_buttons ) {

								jQuery('.themehunk-demo-import')
									.removeAttr('data-import')
									.removeClass('installing updating-message')
									.addClass('button-primary')
									.text( themehunkAdmin.unique.importDemo );
							}

					break;

				case 'upgrade':
						var all_buttons = parseInt( jQuery( '.plugin-card .button' ).length ) || 0,
							disabled_buttons = parseInt( jQuery( '.plugin-card .button.disabled' ).length ) || 0;
							if( all_buttons === disabled_buttons ) {
								jQuery('.themehunk-demo-import')
									.removeAttr('data-import')
									.removeClass('installing updating-message')
									.addClass('button-primary')
									.text( themehunkAdmin.unique.importDemo );
							}
							// var demo_slug = jQuery('.wp-full-overlay-header').attr('data-demo-slug');
							// jQuery('.themehunk-demo-import')
							// 		.addClass('go-pro button-primary')
							// 		.removeClass('themehunk-demo-import')
							// 		.attr('target', '_blank')
							// 		.attr('href', themehunkAdmin.getUpgradeURL + demo_slug )
							// 		.text( themehunkAdmin.getUpgradeText )
							// 		.append('<i class="dashicons dashicons-external"></i>');
					break;

				default:
							var demo_slug = jQuery('.wp-full-overlay-header').attr('data-demo-slug');
							jQuery('.themehunk-demo-import')
									.addClass('go-pro button-primary')
									.removeClass('themehunk-demo-import')
									.attr('target', '_blank')
									.attr('href', themehunkAdmin.getProURL+demo_slug )
									.text( themehunkAdmin.getProText )
									.append('<i class="dashicons dashicons-external"></i>');
					break;
			}

		},


		/**
		 * Install Now
		 */
		_installPluginsStart: function(event)
		{
			event.preventDefault();
			var $button 	= jQuery( event.target ),
				$document   = jQuery(document);

			if ( $button.hasClass( 'updating-message' ) || $button.hasClass( 'button-disabled' ) ) {
				return;
			}

			if ( wp.updates.shouldRequestFilesystemCredentials && ! wp.updates.ajaxLocked ) {
				wp.updates.requestFilesystemCredentials( event );

				$document.on( 'credential-modal-cancel', function() {
					var $message = $( '.install-now.updating-message' );

					$message.removeClass( 'updating-message' ).text( '"Install Now"' );
													//wp.updates.l10n.installNow

						//wp.updates.l10n.updateCancel
					wp.a11y.speak( "Update canceled", 'polite' );
				} );
			}
			wp.updates.installPlugin( {
				slug:    $button.data( 'slug' )
			} );

		},
/**
		 * Plugin Installation Error.
		 */
		_installError: function( event, response ) {

			var $card = jQuery( '.plugin-card-' + response.slug );
			$card
				.removeClass( 'button-primary' )
				.addClass( 'disabled' )
				.html("Installation Failed!");
					//wp.updates.l10n.installFailedShort
				
					console.log(response.errorMessage);
					ThemehunkTemplateAdmin._importFailMessage( response.errorMessage );
		},

		/**
		 * Installing Plugin
		 */
		_pluginInstalling: function(event, args) {
			event.preventDefault();
			var $card = jQuery( '.plugin-card-' + args.slug );
			var $button = $card.find( '.button' );
			$card.addClass('updating-message');
			$button.addClass('already-started');
		},

		/**
		 * Install Success
		 */
		_installSuccess: function( event, response ) {
			console.log(response);

			event.preventDefault();
			var $message     = jQuery( '.plugin-card-' + response.slug ).find( '.button' );
			// Transform the 'Install' button into an 'Activate' button.

			var $init = $message.data('init');
			$message.removeClass( 'install-now installed button-disabled updated-message' )
				.addClass('updating-message')
				.html(themehunkAdmin.unique.pluginActivating);

			// Reset not installed plugins list.
				var pluginsList = themehunkAdmin.requiredPlugins.notinstalled;

			themehunkAdmin.requiredPlugins.notinstalled = ThemehunkTemplateAdmin._removePluginFromQueue( response.slug, pluginsList );

			// WordPress adds "Activate" button after waiting for 1000ms. So we will run our activation after that.
			setTimeout( function() {

				$.ajax({
					url: themehunkAdmin.ajax_url,
					type: 'POST',
					data: {
						'action'            : 'themehunk-plugins-active',
						'init'              : $init,
					},
				}).success(function (result) {
					console.log(result.success);

					 if( result.success ) {

					var pluginsList = themehunkAdmin.requiredPlugins.inactive;

					 	// Reset not installed plugins list.
					 themehunkAdmin.requiredPlugins.inactive = ThemehunkTemplateAdmin._removePluginFromQueue( response.slug, pluginsList );

					$message.removeClass( 'button-primary install-now activate-now updating-message' )
							.attr('disabled', 'disabled')
							.addClass('disabled')
							.text( themehunkAdmin.unique.pluginActive );

						//Enable Demo Import Button
						ThemehunkTemplateAdmin._enable_demo_import_button();

					 } else {

					 	$message.removeClass( 'updating-message' );

					 }

				});

			}, 1200 );

		},

		/**
		 * Bulk Plugin Active & Install
		 */
		_bulkPluginInstallActivate: function()
		{
			if( 0 === themehunkAdmin.requiredPlugins.length ) {
				return;
			}

			jQuery('.required-plugins')
				.find('.install-now')
				.addClass( 'updating-message' )
				.removeClass( 'install-now' )
				.text( "Installing..." );
      				//"Installing..."
			jQuery('.required-plugins')
				.find('.activate-now')
				.addClass('updating-message')
				.removeClass( 'activate-now' )
				.html( themehunkAdmin.unique.pluginActivating );

			var not_installed 	 = themehunkAdmin.requiredPlugins.notinstalled || '';
			var activate_plugins = themehunkAdmin.requiredPlugins.inactive || '';

			// First Install Bulk.
			if( not_installed.length > 0 ) {
				ThemehunkTemplateAdmin._allPluginsInstall( not_installed );
			}

			// Second Activate Bulk.
			if( activate_plugins.length > 0 ) {
				ThemehunkTemplateAdmin._allPluginsActivate( activate_plugins );
			}

		},


		/**
		 * Activate All Plugins.
		 */
		_allPluginsActivate: function( activate_plugins ) {

			// Activate ALl Plugins.
			ThemehunkLibraryAjaxQueue.stop();
			ThemehunkLibraryAjaxQueue.run();


			$.each( activate_plugins, function(index, single_plugin) {

				var $card    	 = jQuery( '.plugin-card-' + single_plugin.slug ),
					$button  	 = $card.find('.button');
			
					$button.addClass('updating-message');

				ThemehunkLibraryAjaxQueue.add({
					url: themehunkAdmin.ajax_url,
					type: 'POST',
					data: {
						'action'            : 'themehunk-plugins-active',
						'init'              : single_plugin.init,
					},
					success: function( result ){

						if( result.success ) {
							var $card = jQuery( '.plugin-card-' + single_plugin.slug );
							var $button = $card.find( '.button' );
							if( ! $button.hasClass('already-started') ) {
								var pluginsList = themehunkAdmin.requiredPlugins.inactive;

								// Reset not installed plugins list.
								themehunkAdmin.requiredPlugins.inactive = ThemehunkTemplateAdmin._removePluginFromQueue( single_plugin.slug, pluginsList );

							}
							$button.removeClass( 'button-primary install-now activate-now updating-message' )
								.attr('disabled', 'disabled')
								.addClass('disabled')
								.text( themehunkAdmin.unique.pluginActive );
							// Enable Demo Import Button
							ThemehunkTemplateAdmin._enable_demo_import_button();
						} else {
						}
					}
				});
			});
		},

		/**
		 * Install All Plugins.
		 */
		_allPluginsInstall: function( not_installed ) {
			
			$.each( not_installed, function(index, single_plugin) {

				var $card   = jQuery( '.plugin-card-' + single_plugin.slug ),
					$button = $card.find('.button');

				if( ! $button.hasClass('already-started') ) {

					// Add each plugin activate request in Ajax queue.
					// @see wp-admin/js/updates.js
					wp.updates.queue.push( {
						action: 'install-plugin', // Required action.
						data:   {
							slug: single_plugin.slug
						}
					} );
				}
			});

			// Required to set queue.
			wp.updates.queueChecker();
		},


		/**
		 * Render Demo Preview
		 */
		_activateNow: function( eventn ) {

			event.preventDefault();

			var $button = jQuery( event.target ),
				$init 	= $button.data( 'init' ),
				$slug 	= $button.data( 'slug' );

			if ( $button.hasClass( 'updating-message' ) || $button.hasClass( 'button-disabled' ) ) {
				return;
			}

			$button.addClass('updating-message button-primary')
				.html( themehunkAdmin.unique.btnActivating );
			$.ajax({
				url: themehunkAdmin.ajax_url,
				type: 'POST',
				data: {
					'action'            : 'themehunk-plugins-active',
					'init'              : $init,
				},
			})
			.done(function (result) {

				if( result.success ) {

					var pluginsList = themehunkAdmin.requiredPlugins.inactive;


					// Reset not installed plugins list.
					themehunkAdmin.requiredPlugins.inactive = ThemehunkTemplateAdmin._removePluginFromQueue( $slug, pluginsList );

					$button.removeClass( 'button-primary install-now activate-now updating-message' )
						.attr('disabled', 'disabled')
						.addClass('disabled')
						.text( themehunkAdmin.unique.pluginActive );

					// Enable Demo Import Button
					ThemehunkTemplateAdmin._enable_demo_import_button();

				}

			})
			.fail(function () {
			});

		},

	_demosite: function(gthis){
				$('.required-plugins').addClass('loading').html('<span class="spinner is-active"></span>');

			var getdata = $(gthis);
			 	getdata.addClass('theme-preview-on');
				var plugin = getdata.attr('plugins');
				var plugins =  '['+plugin.substring(0,plugin.length - 1)+']';
				var demo_type   =  getdata.attr('demo_type');

			 	var themeData = {
				// 	id                       : '23',
				 	demo_name                : getdata.attr('themehunk_template'),
				 	demo_url                 : getdata.attr('themehunk_demo'),
				 	demo_type                : demo_type,
				 	demo_api                 : getdata.attr('api'),
				 	screenshot               : getdata.attr('thumb'),
				 	slug                     : getdata.attr('slug'),
				 	themehunk_import         : getdata.attr('themehunk_import'),
				 	required_plugins         : plugins,
				 };
				 var plugins =  JSON.parse(plugins);
				 if(plugin==''){
				 	plugins = '';
				 }

    			var template = wp.template( 'demo-template' );
			$(".themehunk-site-library-theme-preview").html( template( themeData ) );
			ThemehunkTemplateAdmin._checkPlugins(plugins,demo_type);
			ThemehunkTemplateAdmin._checkNextPrev();

	},

		_demoClick: function(){
			 $(".themehunkdemo").click(function(){
			 ThemehunkTemplateAdmin._demosite(this);
				});

		},

		/**
		 * Collapse Sidebar.
		 */
		_collapse: function() {
			event.preventDefault();

			overlay = jQuery('.wp-full-overlay');

			if (overlay.hasClass('expanded')) {
				overlay.removeClass('expanded');
				overlay.addClass('collapsed');
				return;
			}

			if (overlay.hasClass('collapsed')) {
				overlay.removeClass('collapsed');
				overlay.addClass('expanded');
				return;
			}
		},

		/**
		 * Next Theme.
		 */
		_nextSite: function (event) {
			event.preventDefault();
			currentDemo = jQuery('.theme-preview-on')
			currentDemo.removeClass('theme-preview-on');
			nextDemo = currentDemo.next('.themes');
			nextDemo.addClass('theme-preview-on');
			ThemehunkTemplateAdmin._demosite('.theme-preview-on');
		},
		/**
		 * Previous Theme.
		 */
		_prevSite: function (event) {
			event.preventDefault();
			currentDemo = jQuery('.theme-preview-on')
			currentDemo.removeClass('theme-preview-on');
			nextDemo = currentDemo.prev('.themes');
			nextDemo.addClass('theme-preview-on');
			ThemehunkTemplateAdmin._demosite('.theme-preview-on');
		},
		/**
		 * Check Next & Previous Buttons.
		 */
		_checkNextPrev: function() {
			currentDemo = jQuery('.theme-preview-on');
			nextDemo = currentDemo.nextAll('.themes').length;
			prevDemo = currentDemo.prevAll('.themes').length;
			if (nextDemo == 0) {
				jQuery('.next-theme').addClass('disabled');
			} else if (nextDemo != 0) {
				jQuery('.next-theme').removeClass('disabled');
			}

			if (prevDemo == 0) {
				jQuery('.previous-theme').addClass('disabled');
			} else if (prevDemo != 0) {
				jQuery('.previous-theme').removeClass('disabled');
			}

			return;
		},

		/**
		 * Fires when a nav item is clicked.
		 *
		 * @since 1.0
		 * @access private
		 * @method _importDemo
		 */
		_importDemo: function()
		{

			var $this 	= jQuery(this),
				$theme  = $this.closest('.themehunk-sites-preview').find('.wp-full-overlay-header'),
				apiURL  = $theme.data('demo-api') || '',
				plugins = $theme.data('required-plugins');
					
			var disabled = $this.attr('data-import');

			if ( typeof disabled !== 'undefined' && disabled === 'disabled' || $this.hasClass('disabled') ) {

				$('.themehunk-demo-import').addClass('updating-message installing')
					.text( "Installing..." );
						//wp.updates.l10n.installing
				/**
				 * Process Bulk Plugin Install & Activate
				 */
				ThemehunkTemplateAdmin._bulkPluginInstallActivate();

				return;
			}

			// Proceed?
			if( ! confirm( themehunkAdmin.unique.importWarning ) ) {
				return;
			}
			$('body').addClass('importing-site');
			//$('.previous-theme, .next-theme').addClass('disabled');			// Remove all notices before import start.
			
			$('.install-theme-info > .notice').remove();

			$('.themehunk-demo-import').attr('data-import', 'disabled')
				.addClass('updating-message installing')
				.text( themehunkAdmin.unique.importingDemo );

			$this.closest('.theme').focus();

			var $theme = $this.closest('.themehunk-sites-preview').find('.wp-full-overlay-header');

			var apiURL = $theme.data('demo-api') || '';

			// Site Import by API URL.
			if( apiURL ) {
				ThemehunkTemplateAdmin._importSite( apiURL );
			}

		},


		/**
		 * Start Import Process by API URL.
		 * 
		 * @param  {string} apiURL Site API URL.
		 */
		_importSite: function( apiURL ) {

			$('.button-hero.themehunk-demo-import').text( themehunkAdmin.unique.gettingData );

			// 1. Request Site Import
			$.ajax({
				url  : themehunkAdmin.ajax_url,
				type : 'POST',
			//	dataType: 'json',
				data : {
					'action'  : 'themehunk-import-demo-data',
					'api_url' : apiURL,
				},
			})
			.fail(function( jqXHR ){

				ThemehunkTemplateAdmin._importFailMessage( jqXHR.status + ' ' + jqXHR.responseText );
		    })
			.done(function ( demo_data ) {

				//1. Fail - Request Site Import
				if( false === demo_data.success ) {

					ThemehunkTemplateAdmin._importFailMessage( demo_data.data );

				} else { 

					ThemehunkTemplateAdmin.customizer_data = JSON.stringify( demo_data.data['themehunk-customizer-data'] ) || '';
					ThemehunkTemplateAdmin.xml_url         = encodeURI( demo_data.data['themehunk-xml-path'] ) || '';
					ThemehunkTemplateAdmin.widgets_data    = JSON.stringify( demo_data.data['themehunk-widgets-data'] ) || '';
					ThemehunkTemplateAdmin.options_data    = JSON.stringify( demo_data.data['themehunk-option-data'] ) || '';

			 		$(document).trigger( 'themehunk-sites-import-set-site-data-done' )
				}
		 });
		},
		
		

		_bind: function()
		{				
			$( document ).on('click'	, '.zsl-demo-type ul li', ThemehunkTemplateAdmin._builderDemo);
			$( document ).on('click'	, '.themehunk-category li a', ThemehunkTemplateAdmin._categoryDemo);
			$( document ).on('click'	, '.devices button', ThemehunkTemplateAdmin._previewDevice);
			$( document ).on('click'	, '.close-full-overlay', ThemehunkTemplateAdmin._overlayclose);
			$( document ).on('click'	, '.next-theme', ThemehunkTemplateAdmin._nextSite);
			$( document ).on('click'	, '.previous-theme', ThemehunkTemplateAdmin._prevSite);
			$( document ).on('click'    , '.collapse-sidebar', ThemehunkTemplateAdmin._collapse);
			$( document ).on('click'    , '.themehunk-demo-import', ThemehunkTemplateAdmin._importDemo);
			$( document ).on('click'    , '.install-now', ThemehunkTemplateAdmin._installPluginsStart);
			$( document ).on('click'    , '.activate-now', ThemehunkTemplateAdmin._activateNow);
			$( document ).on('wp-plugin-install-error'   , ThemehunkTemplateAdmin._installError);
			$( document ).on('wp-plugin-installing'      , ThemehunkTemplateAdmin._pluginInstalling);
			$( document ).on('wp-plugin-install-success' , ThemehunkTemplateAdmin._installSuccess);
			$( document ).on('themehunk-sites-import-set-site-data-done' , ThemehunkTemplateAdmin._importPrepareXML );
			$( document ).on('themehunk-sites-import-xml-success'       , ThemehunkTemplateAdmin._importCustomizerSettings );
			$( document ).on('themehunk-import-customizer-settings-success'                 , ThemehunkTemplateAdmin._importOptions );
			$( document ).on('themehunk-import-option-data-success'             , ThemehunkTemplateAdmin._importWidgets );
			$( document ).on('themehunk-sites-import-widgets-success'             , ThemehunkTemplateAdmin._importEnd );
		},


		/**
		 * Preview Device
		 */
		_previewDevice: function( event ) {
			var device = $( event.currentTarget ).data( 'device' );

			$('.theme-install-overlay')
				.removeClass( 'preview-desktop preview-tablet preview-mobile' )
				.addClass( 'preview-' + device )
				.data( 'current-preview-device', device );

			ThemehunkTemplateAdmin._tooglePreviewDeviceButtons( device );
		},


		/**
		 * Import Error Button.
		 * 
		 * @param  {string} data Error message.
		 */
		_importFailMessage: function( message, from ) {

			$('.themehunk-demo-import')
				.addClass('go-pro button-primary')
				.removeClass('updating-message installing')
				.removeAttr('data-import')
				.attr('target', '_blank')
				.append('<i class="dashicons dashicons-external"></i>')
				.removeClass('themehunk-demo-import');

			// Add the doc link due to import log file not generated.
			if( 'undefined' === from ) {

				$('.wp-full-overlay-header .go-pro').text( themehunkAdmin.unique.importFailedBtnSmall );
				$('.wp-full-overlay-footer .go-pro').text( themehunkAdmin.unique.importFailedBtnLarge );
				$('.go-pro').attr('href',  themehunkAdmin.unique.serverConfiguration );

			// Add the import log file link.
			} else {
				
				$('.wp-full-overlay-header .go-pro').text( themehunkAdmin.unique.importFailBtn );
				$('.wp-full-overlay-footer .go-pro').text( themehunkAdmin.unique.importFailBtnLarge )
				
			}

			var output  = '<div class="themehunk-api-error notice notice-error notice-alt is-dismissible">';
				output += '	<p>'+message+'</p>';
				output += '	<button type="button" class="notice-dismiss">';
				output += '		<span class="screen-reader-text">'+commonL10n.dismiss+'</span>';
				output += '	</button>';
				output += '</div>';

			// Fail Notice.
			$('.install-theme-info').append( output );
			

			// !important to add trigger.
			// Which reinitialize the dismiss error message events.
			$(document).trigger('wp-updates-notice-added');
		},


		/**
		 * Toggle Preview Buttons
		 */
		_tooglePreviewDeviceButtons: function( newDevice ) {
			var $devices = $( '.wp-full-overlay-footer .devices' );

			$devices.find( 'button' )
				.removeClass( 'active' )
				.attr( 'aria-pressed', false );

			$devices.find( 'button.preview-' + newDevice )
				.addClass( 'active' )
				.attr( 'aria-pressed', true );
		},

	/**
		 * Import Success Button.
		 * 
		 * @param  {string} data Error message.
		 */
		_importSuccessMessage: function() {

			$('.themehunk-demo-import').removeClass('updating-message installing')
				.removeAttr('data-import')
				.addClass('view-site')
				.removeClass('themehunk-demo-import')
				.text( themehunkAdmin.unique.viewSite )
				.attr('target', '_blank')
				.append('<i class="dashicons dashicons-external"></i>')
				.attr('href', themehunkAdmin.siteURL );
		},

		/**
		 * 5. Import Complete.
		 */
		_importEnd: function( event ) {

			$.ajax({
				url  : themehunkAdmin.ajax_url,
				type : 'POST',
			//	dataType: 'json',
				data : {
					action : 'themehunk-library-import-close',
				},
				beforeSend: function() {
				$('.button-hero.themehunk-demo-import').text( themehunkAdmin.unique.importComplete );
				}
			})
			.fail(function( jqXHR ){
				ThemehunkTemplateAdmin._importFailMessage( jqXHR.status + ' ' + jqXHR.responseText );
		    })
			.done(function ( data ) {

				// 5. Fail - Import Complete.
				if( false === data.success ) {
				ThemehunkTemplateAdmin._importFailMessage( data.data );
				} else {
								console.log('complete');
					$('body').removeClass('importing-site');
					//$('.previous-theme, .next-theme').removeClass('disabled');

					// 5. Pass - Import Complete.
					ThemehunkTemplateAdmin._importSuccessMessage();
				}
			});
		},
		/**
		 * 1. Customizer Srttings.
		 */
		_importCustomizerSettings: function( event ) {
		$.ajax({
				url  :  themehunkAdmin.ajax_url,
				type : 'POST',
				//dataType: 'json',
				data : {
					action          : 'themehunk-library-import-customizer',
					customizer_data : ThemehunkTemplateAdmin.customizer_data,
				},
				beforeSend: function() {
			$('.button-hero.themehunk-demo-import').text( themehunkAdmin.unique.importCustomizer );
				},
			})
			.fail(function( jqXHR ){
				ThemehunkTemplateAdmin._importFailMessage( jqXHR.status + ' ' + jqXHR.responseText );
		    })
			.done(function ( customizer_data ) {
				// 1. Fail - Import Customizer Options.
				if( false === customizer_data.success ) {
					ThemehunkTemplateAdmin._importFailMessage( customizer_data.data );
				} else {

					// 1. Pass - Import Customizer Options.
					$(document).trigger( 'themehunk-import-customizer-settings-success' );
				}
			});
		},
		/**
		 * 2. Prepare XML Data.
		 */
		_importPrepareXML: function( event ) {
			$.ajax({url  : themehunkAdmin.ajax_url,
				
				type : 'POST',
				dataType: 'json',
				data : {
					'action'  : 'themehunk-import-xml',
					'xml_url' : ThemehunkTemplateAdmin.xml_url,
				},
			beforeSend: function() {
					$('.button-hero.themehunk-demo-import').text( themehunkAdmin.unique.importXMLPreparing );
				},
			})
			.fail(function( jqXHR ){

				ThemehunkTemplateAdmin._importFailMessage( jqXHR.status + ' ' + jqXHR.responseText );
		    })
			.done(function ( xml_data ) {

				console.log(xml_data);

				// 2. Fail - Prepare XML Data.
				if( false === xml_data.success ) {
					 ThemehunkTemplateAdmin._importFailMessage( xml_data.data );

				} else {
					console.log('complete page & post');

					// 2. Pass - Prepare XML Data.

					// Import XML though Event Source.
					ThemehunkSSEImport.data = xml_data.data;
					ThemehunkSSEImport.render();

					$('.button-hero.themehunk-demo-import').text( themehunkAdmin.unique.importingXML );
					
					var evtSource = new EventSource( ThemehunkSSEImport.data.url );
					evtSource.onmessage = function ( message ) {
						var data = JSON.parse( message.data );
						switch ( data.action ) {
							case 'updateDelta':
								console.log('updateDelta'+data.type);
									ThemehunkSSEImport.updateDelta( data.type, data.delta );
								break;

							case 'complete':
							console.log('complete' );

								evtSource.close();

								// 2. Pass - Import XML though "Source Event".

							$(document).trigger( 'themehunk-sites-import-xml-success' );

								break;
						}
					};
					evtSource.addEventListener( 'log', function ( message ) {
						var data = JSON.parse( message.data );
					
					});
				}
		 });

		},

		/**
		 * 3. Import option data.
		 */
		_importOptions: function( event ) {

			$.ajax({
				url  : themehunkAdmin.ajax_url,
				type : 'POST',
				//dataType: 'json',
				data : {
					action       : 'themehunk-library-import-options',
					options_data : ThemehunkTemplateAdmin.options_data,
				},
				beforeSend: function() {
					$('.button-hero.themehunk-demo-import').text( themehunkAdmin.unique.importingOptions );

				},
			})
			.fail(function( jqXHR ){
				ThemehunkTemplateAdmin._importFailMessage( jqXHR.status + ' ' + jqXHR.responseText );
		    })
			.done(function ( options_data ) {

				// 3. Fail - Import Site Options.
				if( false === options_data.success ) {
				ThemehunkTemplateAdmin._importFailMessage( options_data.data );

				} else {

					// 3. Pass - Import Site Options.
					$(document).trigger( 'themehunk-import-option-data-success' );
				}
			});
		},


		/**
		 * 4. Import Widgets.
		 */
		_importWidgets: function( event ) {
			$.ajax({
				url  : themehunkAdmin.ajax_url,
				type : 'POST',
			//	dataType: 'json',
				data : {
					action       : 'themehunk-library-import-widgets',
					widgets_data : ThemehunkTemplateAdmin.widgets_data,
				},
				beforeSend: function() {
					$('.button-hero.themehunk-demo-import').text( themehunkAdmin.unique.importingWidgets );
				},
			})
			.fail(function( jqXHR ){
				ThemehunkTemplateAdmin._importFailMessage( jqXHR.status + ' ' + jqXHR.responseText );
		    })
			.done(function ( widgets_data ) {
				// 4. Fail - Import Widgets.
				if( false === widgets_data.success ) {
				ThemehunkTemplateAdmin._importFailMessage( widgets_data.data );

				} else {
				console.log('Import completed..');
					// 4. Pass - Import Widgets.
					$(document).trigger( 'themehunk-sites-import-widgets-success' );					
				}
			});
		},
}; //class end

ThemehunkTemplateAdmin.init();


[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {	
					new SelectFx(el);
				} );

})(jQuery);