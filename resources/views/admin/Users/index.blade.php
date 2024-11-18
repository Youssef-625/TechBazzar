<x-layout>
    <div class="container mx-auto  py-10 -px mt-16">
        <h1 class="text-2xl font-bold mb-6">Manage Users</h1>
        <table class="w-full bg-white border border-gray-200 mt-6">
            <thead>
            <tr class="bg-gray-300">

                <th class="border-b px-1 py-2 text-center">User Name</th>
                <th class="border-b px-1 py-2 text-center">User Phone</th>
                <th class="border-b px-1 py-2 text-center">User Address</th>
                <th class="border-b px-1 py-2 text-center">Email</th>
                <th class="border-b px-1 py-2 text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border-b border-2 px-4 py-2 text-center font-bold">{{ $user->name }}</td>
                    <td class="border-b border-2 px-4 py-2 text-center text-green-500 font-bold">{{$user->phone_number}}</td>
                    <td class="border-b border-2 px-4 py-2 text-center font-bold">{{$user->address}}</td>
                    <td class="border-b border-2 px-4 py-2 text-center font-bold">{{$user->email}}</td>
                    <td class="border-b border-2 px-2 py-2 ">
                        <div class="flex justify-around">
                            <!-- View Icon with Hover Effect -->
                            <a href="/admin/users/{{$user->id}}/edit">
                                <svg style="width: 20px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="#0076d1"
                                          d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/>
                                </svg>
                            </a>

                        </div>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-layout>
