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
                Segment
            </th>
            <th scope="col" class="px-6 py-3">
                Famille
            </th>
            <th scope="col" class="px-6 py-3">
                Groupe
            </th>
            <th scope="col" class="px-6 py-3">
                Metier
            </th>
            <th scope="col" class="px-6 py-3">
                Créé à
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $i => $article)
        @if ($article->segment)
        @can('UserMetier', $article->segment->famille->groupe->metier)
        <tr class="bg-white border-b hover:bg-gray-100 transition-all">
            <td class="px-6 py-4">
                {{$i + 1}}
            </td>
            <td class="px-6 py-4">
                {{$article->article_nom}}
            </td>
            <td class="px-6 py-4">
                {{$article->segment->libelle}}
            </td>
            <td class="px-6 py-4">
                {{$article->segment->famille->famille_nom}}
            </td>
            <td class="px-6 py-4">
                {{$article->segment->famille->groupe->groupe_nom}}
            </td>
            <td class="px-6 py-4">
                {{$article->segment->famille->groupe->metier->metier_nom}}
            </td>
            <td class="px-6 py-4">
                {{$article->created_at->locale('fr')->diffForHumans()}}
            </td>
        </tr>
        @endcan
        @endif
        @endforeach
    </tbody>
</table>