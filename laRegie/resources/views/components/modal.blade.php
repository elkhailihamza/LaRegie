<button data-modal-target="default-modal" data-modal-toggle="default-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Next Step
</button>

<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full border-2">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 border">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nom
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created at
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Controls
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($familles as $i => $famille)
                        <tr class="bg-white border-b hover:bg-gray-100 transition-all">
                            <td class="px-6 py-4">{{$i + 1}}</td>
                            <td class="px-6 py-4">{{ucfirst($famille->famille_nom)}}</td>
                            <td class="px-6 py-4">{{$famille->created_at->diffForHumans()}}</td>
                            <td class="px-6 py-4 flex justify-center">
                                <input type="radio" name="famille" value="{{$famille->id}}" {{ isset($selectedArticle) && $selectedArticle->segment->famille->id == $famille->id ? 'checked' : '' }}>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="flex justify-center items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button type="submit" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Complete</button>
            </div>
        </div>
    </div>
</div>