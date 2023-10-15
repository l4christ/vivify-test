<div>
    <div class="container mx-auto px-4 sm:px-8 py-8">

        <div class="flex justify-between">
            <h2 class="text-2xl font-semibold leading-tight">Tasks</h2>
            <button wire:click='newTaskModal()'
                class="bg-purple-600 px-4 py-2 rounded-md text-white hover:bg-purple-500 cursor-pointer">
                Add new Task
            </button>
        </div>
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Title
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Description
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Created
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Updated
                            </th>
                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status
                            </th>

                            <th
                                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Actions
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $task->title }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $task->description }}</p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $task->created_at->format('Y-m-d') }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $task->updated_at->format('Y-m-d') }}
                                </p>
                            </td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <span @class([ 'text-white  px-3 py-1 font-semibold capitalize rounded-full'
                                    , 'bg-gray-500'=> $task->status == 'todo',
                                    'bg-blue-500' => $task->status == 'inprogress',
                                    'bg-green-500' => $task->status == 'done',
                                    ])>{{ $task->status }}
                                </span>
                            </td>
                            <td class="flex gap-2 items-center px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <div wire:click="viewTask({{ $task->id }})" title="Preview Task">
                                    <svg viewBox="0 0 24 24"
                                        class="fill-purple-700 cursor-pointer hover:bg-purple-50 p-2 w-10 rounded-md"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g data-name="32. Veiw" id="_32._Veiw">
                                            <path
                                                d="M23.909,11.582C21.943,7.311,17.5,3,12,3S2.057,7.311.091,11.582a1.008,1.008,0,0,0,0,.836C2.057,16.689,6.5,21,12,21s9.943-4.311,11.909-8.582A1.008,1.008,0,0,0,23.909,11.582ZM12,19c-4.411,0-8.146-3.552-9.89-7C3.854,8.552,7.589,5,12,5s8.146,3.552,9.89,7C20.146,15.448,16.411,19,12,19Z" />
                                            <path
                                                d="M12,7a5,5,0,1,0,5,5A5.006,5.006,0,0,0,12,7Zm0,8a3,3,0,1,1,3-3A3,3,0,0,1,12,15Z" />
                                        </g>
                                    </svg>
                                </div>

                                <div wire:click="editTask({{ $task->id }})">
                                    <svg fill="none" class="cursor-pointer hover:bg-purple-50 p-2 w-10 rounded-md"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        viewBox="0 0 24 24" width="23" xmlns="http://www.w3.org/2000/svg">
                                        <path class="stroke-blue-600"
                                            d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                        <path class="stroke-blue-600"
                                            d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                    </svg>
                                </div>

                                <div wire:confirm="Are you sure you want to delete this task?"
                                    wire:click="deleteTask({{ $task->id }})" title="Delete Task">
                                    <svg viewBox="0 0 48 48"
                                        class="fill-red-500 cursor-pointer hover:bg-red-50 p-2 w-10 rounded-md"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12 38c0 2.21 1.79 4 4 4h16c2.21 0 4-1.79 4-4v-24h-24v24zm26-30h-7l-2-2h-10l-2 2h-7v4h28v-4z" />
                                        <path d="M0 0h48v48h-48z" fill="none" />
                                    </svg>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <p class="text-gray-900 whitespace-no-wrap">
                                No task created yet...
                            </p>
                        </td>
                        
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                   

                </div>
            </div>
        </div>
    </div>
    <x-modal name="new-task" maxWidth="md" :show="$errors->isNotEmpty()" focusable>
        <div class="p-5">
            <h2>Create New Task</h2>
            <form wire:submit="createNewTask">
                <div class="mt-5">
                    <x-input-label for="title" value="{{ __('title') }}" class="sr-only" />
                    <x-text-input wire:model.blur="title" id="title" name="title" type="text" class="w-full"
                        placeholder="{{ __('Title') }}" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
                <div class="my-5">
                    <x-input-label for="description" value="{{ __('description') }}" class="sr-only" />
                    <textarea wire:model.blur="description" name="description"
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        id="description" cols="30" rows="5" placeholder="{{ __('Description') }}"></textarea>
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
                <div class="">
                    <x-input-label for="status" value="{{ __('status') }}" class="sr-only" />
                    <select wire:model.blur="status" name="status"
                        class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                        id="status">
                        <option> Select Status</option>
                        <option value="todo">Todo</option>
                        <option value="inprogress">In Progress</option>
                        <option value="done">Done</option>
                    </select>
                    <x-input-error :messages="$errors->get('status')" class="mt-2" />
                </div>
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-primary-button class="ml-3">
                        {{ __('Create') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </x-modal>
    <x-modal name="view-task" :show="$errors->isNotEmpty()" focusable>
        <div class="p-5">
            <div class="mb-5 flex justify-between items-center">
                <div>
                    <span class="text-sm font-semibold text-gray-600 dark:text-gray-400">{{ __('Title:') }}</span>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ $title}}
                    </p>
                </div>

                <div>
                    <span
                        class="dark:bg-gray-900 px-3 py-2 shadow text-sm font-semibold bg-green-400 opacity-50 rounded-full">{{
                        $status ?? 'Active' }}</span>
                </div>
            </div>

            <div>
                <span class="text-sm font-semibold text-gray-600 dark:text-gray-400">{{ __('Description:') }}</span>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ $description }}
                </p>
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Close') }}
                </x-secondary-button>
            </div>
        </div>
    </x-modal>
</div>
