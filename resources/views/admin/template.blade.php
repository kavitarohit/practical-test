@include('admin.layouts.header',['title'=>$pageTitle])

@include('admin.layouts.sidebar')
	
@include($middleContent)
	
@include('admin.layouts.footer')