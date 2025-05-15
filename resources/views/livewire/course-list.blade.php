<div>

    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl font-bold mb-6">Courses List</h1>

        <!-- Filter Toggle -->
        <div class="flex justify-between items-center mb-4">
            <div class="space-x-2">
                <button class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
                    wire:click="resetFilter">All</button>
                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
                    wire:click="filterTable(1)">Enrolled</button>
                <button class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600"
                    wire:click="filterTable(0)">Not Enrolled</button>
            </div>
        </div>

        <!-- Course Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg">
                <thead class="bg-gray-100 text-left text-sm font-semibold text-gray-700">
                    <tr>
                        <th class="p-4">Title</th>
                        <th class="p-4">Description</th>
                        <th class="p-4">Date Added</th>
                        <th class="p-4">Comments</th>
                        <th class="p-4">Action</th>
                    </tr>
                </thead>
                <tbody id="courseTable">


                    @foreach ($courses as $course)
                        <tr wire:key={{ $course->id }} class="border-b hover:bg-gray-50">

                            <td class="p-4 font-medium"><a href="#">{{ $course->title }}</a></td>

                            <td class="p-4 text-sm">{{ Str::limit($course->description, 60) }}</td>
                            <td class="p-4 text-sm">{{ $course->created_at }}</td>
                            <td class="p-4 text-sm">{{ count($course->comments) }}</td>

                            @if (auth()->user()->enrolledCourses->contains($course->id))
                                <td class="p-4">
                                    <button wire:click="viewCourse({{ $course->id }})"
                                        class="px-3 py-1 bg-blue-500 text-white rounded text-sm hover:bg-blue-600 mt-2">View</button>
                                    <button wire:confirm="Are you sure you want to Exit from this course?"
                                        wire:click="cancelEnrol({{ $course->id }})"
                                        class="px-3 py-1 bg-red-500 text-white rounded text-sm hover:bg-red-600 mt-2">Cancel</button>
                                </td>
                            @else
                                <td class="p-4">
                                    <button wire:click="enrol({{ $course->id }})"
                                        class="px-3 py-1 bg-green-500 text-white rounded text-sm hover:bg-green-600">Enroll</button>
                                </td>
                            @endif
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-2">

            {{ $courses->links() }}
        </div>
    </div>



</div>
