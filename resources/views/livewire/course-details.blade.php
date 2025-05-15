<div class="">

    <div class="max-w-4xl mx-auto px-4 py-12">
        <a href="/course-list" class="text-sm text-indigo-600 hover:underline mb-4 inline-block">← Back to Courses</a>

        <div class="bg-white shadow-xl rounded-xl p-8">
            <h1 class="text-3xl font-bold mb-4">{{ $course->title }}</h1>
            <img src="{{ asset('storage/image/dummy.png') }}" class="w-80 md:w-[350px] rounded" alt="course image">

            <p class="text-lg text-gray-700 mb-6 mt-2">
                {{ $course->description }}
            </p>

            <ul class="list-disc list-inside text-gray-600 mb-6">
                <li>Duration: {{ $course->duration }}</li>
            </ul>

            <button class="bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-indigo-700 transition">
                Start Learning
            </button>
        </div>
        <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-xl">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Comments</h2>
            <div class="space-y-4 mb-6">
                @foreach ($course->comments as $comment)
                    <div class="border border-gray-200 p-4 rounded">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-sm font-semibold text-gray-700">{{ $comment->user->name }}</span>
                            <span class="text-xs text-gray-500">{{ $comment->created_at }}</span>
                        </div>
                        <div class="flex justify-between">
                            <p class="text-gray-700">{{ $comment->message }}</p>
                            @if (auth()->user()->comments->contains($comment->id))
                                <button wire:confirm="Are you sure you want to delete this comment?"
                                    wire:click="deleteComment({{ $comment->id }})"
                                    class="px-3 py-1 bg-red-500 text-white rounded text-sm hover:bg-red-600">Delete</button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Comment Form -->
            <form class="space-y-4">
                <div>
                    <label for="comment" class="block text-sm font-medium text-gray-700 mb-1">Add a Comment</label>
                    <textarea id="comment" wire:model="comment" rows="4"
                        class="w-full border border-gray-300 rounded p-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Write your comment..."></textarea>
                    @error('comment')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button wire:click.prevent="submitComment"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
                    Post Comment
                </button>
            </form>

        </div>

    </div>



</div>
