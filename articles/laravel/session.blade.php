{{-- set session in backend --}}

$request->session()->put( 'admin', $admin->name );

{{-- call session in frontend --}}
@if (session('admin'))
    <div class="alert alert-success m-1" role="alert"><i class="fa fa-check m-1"></i>{{ session('admin') }}</div>
@endif

{{-- delete in backend --}}
//check session
if ($req->session()->exists('admin')) {
    $req->session()->forget('admin');
}