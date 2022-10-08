<div {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-200 rounded p-6'])}}
    class="bg-gray-50 border border-gray-200 rounded p-6"> <!-- merge the attributes passed in the class -->
    {{$slot}} <!-- this is where the content of the component will be rendered -->
</div>