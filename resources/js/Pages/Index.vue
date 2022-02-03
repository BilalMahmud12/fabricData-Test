<template>
    <!-- The Notification Toast -->
    <Toast />

    <!-- The Header Area -->
    <TheHeader />

    <!-- Page Content -->
    <main class="app-container py-6">

        <!-- The Note Area -->
        <div class="flex items-center space-x-3 text-sm px-6 py-3 rounded-lg bg-sky-50 border border-accent-blue mb-4">
            <span class="text-accent-blue text-xl">
                <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none"><path d="M12 1.999c5.524 0 10.002 4.478 10.002 10.002c0 5.523-4.478 10.001-10.002 10.001C6.476 22.002 2 17.524 2 12.001C1.999 6.477 6.476 1.999 12 1.999zm-.004 8.25a1 1 0 0 0-.992.885l-.007.116l.004 5.502l.006.117a1 1 0 0 0 1.987-.002L13 16.75l-.004-5.501l-.007-.117a1 1 0 0 0-.994-.882zm.005-3.749a1.251 1.251 0 1 0 0 2.503A1.251 1.251 0 0 0 12 6.5z" fill="currentColor"/></g></svg>
            </span>
            <span class="text-accent-blue">You can fetch different collections of Matrix Movie and save them into database</span>
        </div>

        <!-- The Buttons Area -->
        <div class="flex flex-col md:flex-row items-center space-y-2 md:space-y-0 md:space-x-3 mb-6">
            <Button
                label="Matrix"
                q-string="Matrix"
                class="text-accent-green"
                @get-movies="queryMovies($event)"
            />
            <Button
                label="Matrix Reloaded"
                q-string="Matrix Reloaded"
                class="text-accent-blue"
                @get-movies="queryMovies($event)"
            />
            <Button
                label="Matrix Revolutions"
                q-string="Matrix Revolutions"
                class="text-accent"
                @get-movies="queryMovies($event)"
            />
        </div>

        <!-- The Results Area -->
        <div>
            <div class="mb-3 text-xs">
                <span>Showing {{ movieList.length }} Records</span>
            </div>
            <div v-if="movieList.length > 0" class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-4 md:gap-6">
                <MovieCard
                    v-for="movie in movieList"
                    :key="movie.imdbID"
                    :movie="movie"
                />
            </div>
            <div v-else class="flex items-center space-x-3 text-sm px-6 py-3 rounded-lg bg-red-50 border border-red-500 mb-4">
                <span class="text-red-500 text-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><path d="M10 18a7.952 7.952 0 0 0 4.897-1.688l4.396 4.396l1.414-1.414l-4.396-4.396A7.952 7.952 0 0 0 18 10c0-4.411-3.589-8-8-8s-8 3.589-8 8s3.589 8 8 8zm0-14c3.309 0 6 2.691 6 6s-2.691 6-6 6s-6-2.691-6-6s2.691-6 6-6z" fill="currentColor"/><path d="M11.412 8.586c.379.38.588.882.588 1.414h2a3.977 3.977 0 0 0-1.174-2.828c-1.514-1.512-4.139-1.512-5.652 0l1.412 1.416c.76-.758 2.07-.756 2.826-.002z" fill="currentColor"/></svg>
                </span>
                <span class="text-red-500">We are Sorry! No Movies Found in database. please try to fetch some movies.</span>
            </div>
        </div>

    </main>

    <!-- The Footer Area -->
    <TheFooter />

</template>

<script>
import NProgress from 'nprogress'
import {Inertia} from "@inertiajs/inertia";
import Toast from "../components/Toast";
import TheHeader from "../components/TheHeader";
import TheFooter from "../components/TheFooter";
import Button from "../components/Button";
import MovieCard from "../components/MovieCard";

export default {
    name: "Index",
    components: {
        Toast,
        TheHeader,
        TheFooter,
        Button,
        MovieCard
    },
    props: {
        'movieList': Object
    },
    setup() {
        function queryMovies(event){
            const form = new FormData
            form.append('search', event)
            NProgress.start()
            Inertia.post(route('get-movies', event), {
                preserveState: (page) => Object.keys(page.props.errors).length,
            })
            NProgress.done()
        }
        return {
            queryMovies,
        }
    }
}
</script>

<style scoped>

</style>
