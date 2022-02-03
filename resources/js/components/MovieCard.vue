<template>
    <div class="rounded-lg overflow-hidden bg-white shadow relative hover:cursor-pointer hover:shadow-2xl transition-all duration-300 ease-in-out">
        <span class="block absolute top-3 left-3 z-10 bg-red-600 text-xs text-white px-5 py-1 rounded-md capitalize">
            {{ movie.type }}
        </span>
        <div class="aspect-[3/4] overflow-hidden flex-shrink-0 relative">
            <div class="overlay"></div>
            <img v-if="movie.poster.poster_url !== 'N/A'" :src="movie.poster.poster_url" :alt="movie.title" class="object-cover object-center w-full h-full">
            <div v-else class="flex items-center justify-center w-full h-full">
                <span class="text-4xl text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 1l22 22"/><path d="M21 21H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h3m3-3h6l2 3h4a2 2 0 0 1 2 2v9.34m-7.72-2.06a4 4 0 1 1-5.56-5.56"/></g></svg>
                </span>
            </div>
        </div>
        <div class="px-4 py-3">
            <span class="block text-xs text-center text-orange-900 py-1 rounded-md bg-yellow-400 mb-2 w-12">{{ movie.year }}</span>
            <h2 class="mb-2">{{ movie.title }}</h2>
            <div class="flex items-center justify-between">
                <span class="text-xs text-gray-500">IMDBID {{ movie.imdb_id }}</span>
            </div>

        </div>
    </div>
</template>

<script>
export default {
    name: "MovieCard",
    props: {
        movie: {
            id: {
                type: String,
                default: () => {}
            },
        }
    }
}
</script>

<style scoped>
.overlay {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 0;
    background: linear-gradient(161deg , #2d3748 0,transparent 100%);
}
</style>
