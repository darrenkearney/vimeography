<script>
  import { mapState, mapActions } from 'vuex'

  import { Player, Filters } from 'vimeography-blueprint';

  import ThumbnailContainer from './ThumbnailContainer.vue';

  // Custom Vimeo Player Loop UI
  import LoopControls from './LoopControls.vue'

  const defaultTemplate = `
    <div class="vimeography-gallery">
      <filters v-if="this.pro"></filters>
      <div class="vimeography-player-and-loop-controls-container">
        <player :activeVideo="this.activeVideo"></player>
        <loop-controls></loop-controls>
      </div>
      <thumbnail-container :videos="videos" :activeVideoId="this.activeVideo.id"></thumbnail-container>
    </div>
  `;

const userTemplate = document.querySelector(
  "#vimeography-harvestone-gallery"
);

  const Gallery = {
    name: 'gallery',
    template: userTemplate ? userTemplate.innerText : defaultTemplate,
    methods: {
      ...mapActions([
        'loadVideo',
      ]),
    },
    watch: {
      '$route' (to, from) {
        const videoId = to.query.vimeography_video;
        const gallery = to.query.vimeography_gallery;

        if (videoId && gallery && gallery == this.galleryId) {
          this.loadVideo(videoId)
        }
      }
    },
    computed: {
      ...mapState({
        activeVideo: state => state.videos.items[state.videos.active],
        galleryId: state => state.gallery.id,
        pro: state => state.gallery.pro
      }),
      videos() {
        return this.$store.getters.getVideos
      }
    },
    components: {
      Player,
      Filters,
      LoopControls,
      ThumbnailContainer
    },
    mounted: function() {
      // Add external javascript library for manipulating the vimeo player controls.
      let PlayerScript = document.createElement("script");
      PlayerScript.setAttribute("src", "https://player.vimeo.com/api/player.js");
      document.head.appendChild(PlayerScript);
      // // Add external javascript library for manipulating the vimeo player controls.
      // let LoopControlsScript = document.createElement("script");
      // LoopControlsScript.setAttribute("src", "./wp-content/uploads/loop-controls.js");
      // document.head.appendChild(LoopControlsScript);
    }
  }

  export default Gallery;
</script>

<style lang="scss" scoped>
  .vimeography-gallery {
    width: 90%;
    margin: 0 auto 1rem;
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    position: relative;
  }
  .vimeography-player-and-loop-controls-container {
    width: 75%;
  }
  .vimeography-gallery .vimeography-player-container {
    width: 100%;
    margin-bottom: 0;
  }
</style>
