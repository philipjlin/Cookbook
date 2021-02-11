<!doctype html>
<html>

<head>
    <title>
        {{-- Yield the title if it exists, otherwise default to 'Cookbook' --}}
        @yield('title','Cookbook')
    </title>

    <meta charset='utf-8'>

    {{-- Yield any page specific CSS files or anything else you might want in the <head> --}}
    @yield('head')
</head>

<body>

    <header>
        {{-- Main page content will be yielded here --}}
        @yield('header')
    </header>

    <section>
        {{-- Main page content will be yielded here --}}
        @yield('content')
    </section>

    <footer>
        <br><br>
        &copy; {{ date('Y') }}
    </footer>

    {{-- Yield any page specific JS files or anything else you might want at the end of the body --}}
    @yield('body')

</body>

</html>
