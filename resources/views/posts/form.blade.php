<div  class="block m-auto w-7/12 rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
    <div class="flex items-center justify-center w-full">

        <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
            @if(empty($post->photo_name))
            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
            </div>
            @else
                <img class="w-full h-full object-contain" src="{{asset('storage/'.$post->photo_name)}}">
            @endif
            <input id="dropzone-file" type="file" name="photo_name" class="hidden" />
        </label>
    </div>
    <div class="relative mb-6 my-5" data-te-input-wrapper-init>
            <input
                required
                type="text"
                name="title"
                value="{{old('title',$post->title??null)}}"
                class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                id="exampleInput7"
                placeholder="Title" />
        </div>

        <!--body textarea-->
        <div class="relative mb-6" data-te-input-wrapper-init>
      <textarea required
          class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
          id="exampleFormControlTextarea13"
          rows="3"
          placeholder="body"  name="body">{{old('body',$post->body??null)}}
      </textarea>
        </div>
    <div class="relative">
        <select id="tagSelect" name="tags[]" required multiple class="block appearance-none w-full bg-white border border-gray-300 rounded-md py-2 px-3 pr-8 leading-tight focus:outline-none focus:border-gray-500">

            @forelse($tags as $inx => $tag)
                  <option value="{{$inx}}" {{in_array($inx,$tagsSelected??[])?'selected':''}}>{!! $tag !!}</option>
            @empty
                <option value="tag1">no there category</option>
            @endforelse
        </select>
        <div id="tagContainer" class="flex flex-wrap mt-2">
            @isset($tagsSelected)
                @foreach($tagsSelected as $name =>$item)
                    <span class="inline-block bg-blue-500 text-white py-1 px-2 mr-2 my-1 rounded">
                        <span class="cursor-pointer ml-1 removeIcons">&times;</span>
                        {!! $name !!}
                    </span>
                @endforeach
            @endisset
        </div>
    </div>
    <input
        class="mr-2 mt-[0.3rem] h-3.5 w-8 appearance-none rounded-[0.4375rem] bg-neutral-300 before:pointer-events-none before:absolute before:h-3.5 before:w-3.5 before:rounded-full before:bg-transparent before:content-[''] after:absolute after:z-[2] after:-mt-[0.1875rem] after:h-5 after:w-5 after:rounded-full after:border-none after:bg-neutral-100 after:shadow-[0_0px_3px_0_rgb(0_0_0_/_7%),_0_2px_2px_0_rgb(0_0_0_/_4%)] after:transition-[background-color_0.2s,transform_0.2s] after:content-[''] checked:bg-primary checked:after:absolute checked:after:z-[2] checked:after:-mt-[3px] checked:after:ml-[1.0625rem] checked:after:h-5 checked:after:w-5 checked:after:rounded-full checked:after:border-none checked:after:bg-primary checked:after:shadow-[0_3px_1px_-2px_rgba(0,0,0,0.2),_0_2px_2px_0_rgba(0,0,0,0.14),_0_1px_5px_0_rgba(0,0,0,0.12)] checked:after:transition-[background-color_0.2s,transform_0.2s] checked:after:content-[''] hover:cursor-pointer focus:outline-none focus:ring-0 focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[3px_-1px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-5 focus:after:w-5 focus:after:rounded-full focus:after:content-[''] checked:focus:border-primary checked:focus:bg-primary checked:focus:before:ml-[1.0625rem] checked:focus:before:scale-100 checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] dark:bg-neutral-600 dark:after:bg-neutral-400 dark:checked:bg-primary dark:checked:after:bg-primary dark:focus:before:shadow-[3px_-1px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[3px_-1px_0px_13px_#3b71ca]"
        type="checkbox"
        role="switch"
        name="is_publish"
        value="1"
        id="flexSwitchCheckDefault" {{isset($post) && $post->is_publish?'checked':''}} />
    <label
        class="inline-block pl-[0.15rem] hover:cursor-pointer"
        for="flexSwitchCheckDefault"
    >Publish</label
    >

</div>
<script>
        const tagSelect = document.getElementById('tagSelect');
        const tagContainer = document.getElementById('tagContainer');

        tagSelect.addEventListener('change', function() {
            renderTags(Array.from(this.selectedOptions));
        });

        function renderTags(selectedOptions) {
            tagContainer.innerHTML = '';

            selectedOptions.forEach(option => {
                const tagElement = document.createElement('span');
                tagElement.textContent = option.text;
                tagElement.classList.add('inline-block', 'bg-blue-500', 'text-white', 'py-1', 'px-2', 'mr-2', 'my-1', 'rounded');

                const removeIcon = document.createElement('span');
                removeIcon.innerHTML = '&times;';
                removeIcon.classList.add('ml-1', 'cursor-pointer');
                removeIcon.addEventListener('click', function() {
                    tagSelect.options[option.index].selected = false;
                    renderTags(Array.from(tagSelect.selectedOptions));
                });

                tagElement.appendChild(removeIcon);
                tagContainer.appendChild(tagElement);
            });
        }
        const removeIcons = document.querySelectorAll('.removeIcons');
        removeIcons.forEach(e=>{
            e.addEventListener('click', function(e) {
                e.target.selected = false;
               renderTags(Array.from(tagSelect.selectedOptions));
            });
        });
</script>
