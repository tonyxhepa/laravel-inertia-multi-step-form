<div>
 <h1>Welcome</h1>
    <div class="max-w-2xl mx-auto space-y-8 divide-y divide-gray-200 p-8 bg-white rounded mt-10">
  <form enctype="multipart/form-data">
   @if ($formStep == 1)
      <div class="sm:col-span-6">
      <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
      <div class="mt-1">
        <input type="text" id="name" wire:model.lazy="name" name="name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
      </div>
          @error('name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="sm:col-span-6 pt-5">
      <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
      <div class="mt-1">
        <textarea id="body" rows="3" wire:model.lazy="body" class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
      </div>
          @error('body') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
    </div>
   @elseif ($formStep == 2)
    <div class="sm:col-span-6">
      <label for="user_name" class="block text-sm font-medium text-gray-700"> User Name </label>
      <div class="mt-1">
        <input type="text" id="user_name" wire:model.lazy="user_name" name="user_name" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
      </div>
          @error('user_name') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
    </div>
    <div class="sm:col-span-6">
      <label for="address" class="block text-sm font-medium text-gray-700"> Address </label>
      <div class="mt-1">
        <input type="text" id="address" wire:model.lazy="address" name="address" class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
      </div>
          @error('address') <span class="text-red-400 text-sm">{{ $message }}</span> @enderror
    </div>
    @endif
    <div class="mt-6">
      @if ($formStep == 1)
        <button type="button" class="px-4 py-2 bg-green-500 rounded" wire:click="nextStep">Next</button>
        @elseif ($formStep == 2)
        <button type="button" class="px-4 py-2 bg-green-500 rounded" wire:click="prevStep">Prev</button>
        <button type="button" class="px-4 py-2 bg-green-500 rounded" wire:click="storeProduct">Create</button>
      @endif
    </div>
  </form>
</div>

</div>
