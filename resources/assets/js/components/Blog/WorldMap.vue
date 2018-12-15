<template>
    <div ref="map" class="blog-map"></div>
</template>

<script>
export default {
    data() {
        return {

        };
    },
    mounted() {
        const map = new google.maps.Map(this.$refs.map, {
            center: {lat: -34.397, lng: 150.644},
            zoom: 8
        });
    }
}
</script>