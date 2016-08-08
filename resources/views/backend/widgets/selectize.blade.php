{{-- 
	widget name 		: Selectize input menu
	required parameter 	: type, name, init_data, ajax_url
	passing variable 	: $components
	passing components 	: $components[
							'type' => 'SELECTED SELECTIZE VARIANT', 
							'name' => 'YOUR FORM INPUT NAME', 
							'init_data => 'JSON OF DATA ARRAY WITH SELECTIZE INITIALIZE ARRAY DATA FORMAT', 
							'ajax_url' => 'URL AJAX']
	selectize dt format : {'value' : 'id of option/select', 'text' : 'data caption'}
	available type		: 	1. version : business unit version
							2. faq_kategori : kategori faq
	author 				: Budi
--}}


{{-- ==Version====================================================================================================== --}}

@if(strtolower($components['type']) == 'version')

	{!! Form::text($components['name'] , null, ['class' => 'form-control select_version' ]) !!}

	@section('scripts')
		$('.select_version').selectize({
		    create: false,
		    sortField: 'text',
		    maxItems: 1,
		    persist: false,

			onInitialize: function() {
				var option = JSON.parse({!! json_encode($components['init_data']) !!});
				var self = this;

				if (option != null){
					self.addOption(option);
		            self.addItem(option['value']);
				}
			},
			load: function(query, callback) {
				if (!query.length) return callback();
				$.ajax({
					url: '{{ $components['ajax_url'] }}',
					type: 'GET',
					error: function() {
						callback();
					},
					success: function(res) {
						callback(res);
					}
				});
			}		
		});
	@append

@endif


{{-- ==Faq Kategori================================================================================================= --}}

@if(strtolower($components['type']) == 'faq_kategori')

	{!! Form::text($components['name'] , null, ['class' => 'form-control select_faq_kategori' ]) !!}

	@section('scripts')
		$('.select_faq_kategori').selectize({
		    create: true,
		    sortField: 'text',
		    maxItems: 1,
		    persist: false,

			onInitialize: function() {
				var option = JSON.parse({!! json_encode($components['init_data']) !!});
				var self = this;

				if (option != null){
					self.addOption(option);
		            self.addItem(option['value']);
				}
			},
			load: function(query, callback) {
				if (!query.length) return callback();
				$.ajax({
					url: '{{ $components['ajax_url'] }}',
					type: 'GET',
					error: function() {
						callback();
					},
					success: function(res) {
						callback(res);
					}
				});
			}		
		});
	@append

@endif


{{-- ==Faq Sub Kategori============================================================================================= --}}

@if(strtolower($components['type']) == 'faq_sub_kategori')

	{!! Form::text($components['name'] , null, ['class' => 'form-control select_faq_subkategori' ]) !!}

	@section('scripts')
		$('.select_faq_subkategori').selectize({
		    create: true,
		    sortField: 'text',
		    maxItems: 1,
		    persist: false,

			onInitialize: function() {
				var option = JSON.parse({!! json_encode($components['init_data']) !!});
				var self = this;

				if (option != null){
					self.addOption(option);
		            self.addItem(option['value']);
				}
			},
			load: function(query, callback) {
				if (!query.length) return callback();
				$.ajax({
					url: '{{ $components['ajax_url'] }}',
					type: 'GET',
					error: function() {
						callback();
					},
					success: function(res) {
						callback(res);
					}
				});
			}		
		});
	@append

@endif