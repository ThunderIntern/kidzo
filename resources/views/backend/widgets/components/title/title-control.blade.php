
{{-- 
	Component name 		: Title with control
	Description 		: Display title with selected contol action
	required parameter 	: component
	passing variable 	: $component
	passing components 	: $component["title" => "YOUR TITLE", "controls" => [ARRAY OF CONTROLS SELECTED] ]
	Available Controls 	: 1. Back ['back' => ['link' => 'YOUR BACK LINK']]
						  2. Save ['save' => ['link' => 'YOUR SAVE LINK']]
						  3. Edit ['edit' => ['link' => 'YOUR EDIT LINK']]
	author 				: Budi
--}}

<h4 class="card-title">
	{{$component['title']}}
</h4>
<hr>

@if(isset($component['controls']['back']))
<a href="{{$component['controls']['back']['link']}}" class="btn btn-primary-outline">
	<i class="fa fa-chevron-left"></i> 
	Back
</a>
@endif

@if(isset($component['controls']['save']))
<button type="submit" class="btn btn-primary-outline pull-right">
	<i class="fa fa-save"></i>
	Save
</button>
@endif

@if(isset($component['controls']['edit']))
<a href="{{$component['controls']['edit']['link']}}" class="btn btn-primary-outline pull-right">
	<i class="fa fa-pencil"></i>
	Edit
</button>
@endif
<hr class="thick">