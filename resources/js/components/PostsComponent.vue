<template>
    <div class="container mx-auto p-6">
        <img src="/images/social-media.jpeg" alt="social media">
        <h1
            class="my-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
            Social Snapshot</h1>

        <div class="bg-white shadow-lg rounded-lg p-6 my-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Project Description:</h2>
            <h3 class="text-xl text-gray-700 mb-3">SocialStream - Viewing and Filtering Social Media Posts</h3>
            <p class="text-gray-600 mb-2">
                <strong>SocialStream</strong> is an intuitive platform that allows you to view and filter social media posts
                from predefined lists of people. Utilizing cutting-edge technology, our application streamlines how you
                interact with social media feeds from networks like Facebook and Twitter and is readily adaptable to support
                additional social networks with minimal changes.
            </p>
            <div class="mt-4">
                <h4 class="text-lg font-semibold text-gray-700 mb-2">Key Features Include:</h4>
                <ul class="list-disc list-inside space-y-1 text-gray-600">
                    <li>Post Display from the database, detailing the date posted, social network, link to the original
                        post, name of the post's author, and the list it belongs to.</li>
                    <li>Advanced Filtering which allows selection of posts based on criteria like list, date range, social
                        network, and text content of the post.</li>
                    <li>Scalable Architecture, designed for fast, filtered results, even with large volumes of data.</li>
                    <li>Rigorous Testing, with unit and integration tests ensuring reliability and stability.</li>
                </ul>
            </div>
            <p class="text-gray-600 mt-4">
                SocialStream is more than just a content aggregator - it's a customizable window into the social media
                world, designed to preserve posts without losing them, even after modifying lists.
            </p>
        </div>

        <div class="grid grid-cols-4 gap-4">
            <!-- Filter Selection -->
            <div class="mb-4">
                <label for="filterType" class="block mb-2 text-sm font-medium text-gray-700">Select Filter Type:</label>
                <select id="filterType" v-model="selectedFilter" class="p-2 border border-gray-300 rounded-md">
                    <option value="name">Name</option>
                    <option value="dateRange">Date Range</option>
                    <option value="network">Network</option>
                    <option value="text">Text</option>
                </select>
            </div>

            <div>
                <!-- Filter for Name -->
                <div v-if="selectedFilter === 'name'" class="mb-4">
                    <label for="userNameFilter" class="block mb-2 text-sm font-medium text-gray-700">Name:</label>
                    <input type="text" id="userNameFilter" v-model="nameFilter"
                        class="p-2 border border-gray-300 rounded-md" placeholder="User name" />
                </div>

                <!-- Filter for Date Range -->
                <div v-if="selectedFilter === 'dateRange'" class="mb-4 grid grid-cols-2 gap-4">
                    <div>
                        <label for="startDate" class="block mb-2 text-sm font-medium text-gray-700">Start Date:</label>
                        <input type="date" id="startDate" v-model="startDate"
                            class="p-2 border border-gray-300 rounded-md" />
                    </div>
                    <div>
                        <label for="endDate" class="block mb-2 text-sm font-medium text-gray-700">End Date:</label>
                        <input type="date" id="endDate" v-model="endDate" class="p-2 border border-gray-300 rounded-md" />
                    </div>
                </div>

                <!-- Filter for Network -->
                <div v-if="selectedFilter === 'network'" class="mb-4">
                    <label for="networkFilter" class="block mb-2 text-sm font-medium text-gray-700">Select Network:</label>
                    <select id="networkFilter" v-model="networkFilter" class="p-2 border border-gray-300 rounded-md">
                        <option value="Facebook">Facebook</option>
                        <option value="Twitter">Twitter</option>
                    </select>
                </div>

                <!-- Filter for Text -->
                <div v-if="selectedFilter === 'text'" class="mb-4">
                    <label for="textFilter" class="block mb-2 text-sm font-medium text-gray-700">Enter Text:</label>
                    <input type="text" id="textFilter" v-model="textFilter" class="p-2 border border-gray-300 rounded-md"
                        placeholder="Search text" />
                </div>
            </div>

            <div class="flex items-center">
                <button @click="applyFilters"
                    class="self-center px-4 py-2 mt-3 bg-blue-500 text-white rounded-md hover:bg-blue-600">Apply
                    Filters</button>

                <button
                    class="self-center px-4 py-2 mx-3  mt-3 bg-blue-500 text-white rounded-md hover:bg-blue-600"
                    @click="resetFilters">
                    Reset Filters
                </button>
            </div>
        </div>

        <!-- Displaying Posts -->
        <div class="relative overflow-x-auto mt-6">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">ID</th>
                        <th class="px-6 py-3">User ID</th>
                        <th class="px-6 py-3">Title</th>
                        <th class="px-6 py-3">Date Posted</th>
                        <th class="px-6 py-3">Social Network</th>
                        <th class="px-6 py-3">Original Link</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="post in posts" :key="post.id" class="bg-white border-b">
                        <td class="px-6 py-4">{{ post.id }}</td>
                        <td class="px-6 py-4">{{ post.user_id }}</td>
                        <td class="px-6 py-4">{{ post.title }}</td>
                        <td class="px-6 py-4">{{ post.date_posted }}</td>
                        <td class="px-6 py-4">{{ post.social_network }}</td>
                        <td class="px-6 py-4">
                            <a :href="post.original_link" target="_blank" class="text-blue-600 hover:text-blue-800">{{
                                post.original_link }}</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            posts: [],
            selectedFilter: '',
            nameFilter: '',
            startDate: '',
            endDate: '',
            networkFilter: '',
            textFilter: '',
        };
    },
    mounted() {
        this.fetchAllPosts(); // Fetch all posts on component mount
    },
    methods: {
        // Fetch all posts from the server without applying any filters
        async fetchAllPosts() {
            try {
                const response = await axios.get('/api/posts');
                this.posts = response.data.data;
            } catch (error) {
                console.error('Error fetching posts:', error);
            }
        },
        // Apply filters and fetch filtered posts
        async applyFilters() {
            const filters = {
                name: this.nameFilter,
                startDate: this.startDate,
                endDate: this.endDate,
                network: this.networkFilter,
                text: this.textFilter,
            };

            try {
                const response = await axios.get('/api/filter-posts', { params: filters });
                this.posts = response.data.data;
                console.log(this.posts)
            } catch (error) {
                console.error('Error during filtering:', error);
            }
        },
        //reset Filters
        resetFilters(){
            this.fetchAllPosts();
            this.selectedFilter = '';
        }
    },
};
</script>
