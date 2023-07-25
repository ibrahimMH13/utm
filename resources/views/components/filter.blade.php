@props(['class' => ''])
<div class="{{$class}}">
    <h1 class="text-xl font-bold text-gray-600">Filter</h1>
    <div class="w-full mt-5 flex content-between">
        <label for="country" class="block text-sm text-right w-full m-auto font-medium text-gray-700">By</label>
        <form method="get" class="w-full" action="">
            <select id="show" name="show" onchange="this.form.submit()" autocomplete="order by" class="mt-1 w-full block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="newest" <?= isset($_GET['show']) && $_GET['show'] =='newest'?'selected':'' ?> >new</option>
                <option value="older" <?= isset($_GET['show']) && $_GET['show'] =='older'?'selected':'' ?> >old</option>
            </select>
        </form>
        @php($categories=\App\Models\Tag::pluck('slug','name'))
        <form method="get" class="w-full" action="">
            <select id="category" name="category" onchange="this.form.submit()" autocomplete="order by" class="mt-1 w-full block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                @foreach($categories as $name =>$id)
                <option value="{{$id}}" <?= isset($_GET['category']) && $_GET['category'] ==$id?'selected':'' ?> >{{$name}}</option>
                @endforeach
            </select>
        </form>
    </div>
 </div>
