<template>
  <div class="flex flex-wrap justify-around">
    <span
      v-if="logins.facebook == 1"
      v-tippy="'Facebook'"
      class="mb-2 mr-3 text-blue-500 transition duration-300 cursor-pointer fa-brands fa-square-facebook fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('facebook')"
    />
    <span
      v-if="logins.twitter == 1"
      v-tippy="'Twitter'"
      class="mb-2 mr-3 text-blue-300 transition duration-300 cursor-pointer fa-brands fa-twitter fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('twitter')"
    />
    <span
      v-if="logins.instagram == 1"
      v-tippy="'Instagram'"
      class="mb-2 mr-3 text-gray-700 transition duration-300 cursor-pointer fa-brands fa-instagram fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('instagram')"
    />
    <span
      v-if="logins.github == 1"
      v-tippy="'GitHub'"
      class="mb-2 mr-3 text-gray-800 transition duration-300 cursor-pointer fa-brands fa-github fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('github')"
    />
    <span
      v-if="logins.youtube == 1"
      v-tippy="'YouTube'"
      class="mb-2 mr-3 text-red-500 transition duration-300 cursor-pointer fa-brands fa-youtube fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('youtube')"
    />
    <span
      v-if="logins.google == 1"
      v-tippy="'Google'"
      class="mb-2 mr-3 text-red-500 transition duration-300 cursor-pointer fa-brands fa-google fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('google')"
    />
    <span
      v-if="logins.linkedin == 1"
      v-tippy="'LinkedIn'"
      class="mb-2 mr-3 text-blue-700 transition duration-300 cursor-pointer fa-brands fa-linkedin fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('linkedin')"
    />
    <span
      v-if="logins.twitch == 1"
      v-tippy="'Twitch'"
      class="mb-2 mr-3 text-blue-600 transition duration-300 cursor-pointer fa-brands fa-twitch fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('twitch')"
    />
    <span
      v-if="logins.apple == 1"
      v-tippy="'Apple'"
      class="mb-2 mr-3 text-gray-800 transition duration-300 cursor-pointer fa-brands fa-apple fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('apple')"
    />
    <span
      v-if="logins.microsoft == 1"
      v-tippy="'Microsoft'"
      class="mb-2 mr-3 text-blue-300 transition duration-300 cursor-pointer fa-brands fa-microsoft fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('microsoft')"
    />
    <span
      v-if="logins.tiktok == 1"
      v-tippy="'TikTok'"
      class="mb-2 mr-3 text-pink-600 transition duration-300 cursor-pointer fa-brands fa-tiktok fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('tiktok')"
    />
    <span
      v-if="logins.zoho == 1"
      v-tippy="'Zoho'"
      class="mb-2 mr-3 text-yellow-500 transition duration-300 cursor-pointer fas fa-z fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('zoho')"
    />
    <span
      v-if="logins.stackexchange == 1"
      v-tippy="'StackExchange'"
      class="mb-2 mr-3 text-blue-400 transition duration-300 cursor-pointer fa-brands fa-stack-exchange fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('stackexchange')"
    />
    <span
      v-if="logins.gitlab == 1"
      v-tippy="'GitLab'"
      class="mb-2 mr-3 text-orange-400 transition duration-300 cursor-pointer fa-brands fa-square-gitlab fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('gitlab')"
    />
    <span
      v-if="logins.reddit == 1"
      v-tippy="'GitLab'"
      class="mb-2 mr-3 text-orange-700 transition duration-300 cursor-pointer fa-brands fa-square-reddit fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('reddit')"
    />
    <span
      v-if="logins.snapchat == 1"
      v-tippy="'Snapchat'"
      class="mb-2 mr-3 text-yellow-400 transition duration-300 cursor-pointer fa-brands fa-square-snapchat fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('snapchat')"
    />
    <span
      v-if="logins.meetup == 1"
      v-tippy="'Meetup'"
      class="mb-2 mr-3 text-red-400 transition duration-300 cursor-pointer fa-brands fa-meetup fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('meetup')"
    />
    <span
      v-if="logins.atlassian == 1"
      v-tippy="'Atlassian'"
      class="mb-2 mr-3 text-blue-800 transition duration-300 cursor-pointer fa-brands fa-atlassian fa-3x opacity-80 hover:opacity-100"
      :class="loading ? 'disabled opacity-40' : ''"
      @click="socialiteLogin('atlassian')"
    />

    <!-- NEW_PROVIDER_PLUG :: Put New Provider HERE -->
  </div>
</template>

<script lang="ts">
import * as Vue from 'vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import { mapGetters, mapActions } from 'vuex';
import { track } from '@services/analytics';

export default {
  name: 'SocialiteLogins',
  components: {},
  props: {},
  setup() {
    return {};
  },
  data() {
    return {
      loading: false,
      window: {},
      authWindowTitle: 'Authentication Login',
    };
  },
  computed: {
    ...mapGetters({
      logins: 'auth/logins',
      token: 'auth/token',
    }),
    socialLoginsEnabled() {
      if (Object.values(this.logins).find((v) => v == '1')) {
        return true;
      }
      return false;
    },
  },
  watch: {},
  created() {},
  mounted() {
    window.addEventListener('message', this.onMessage, false);
  },
  beforeUnmount() {
    window.removeEventListener('message', this.onMessage);
  },
  updated() {},
  methods: {
    ...mapActions({
      popToast: 'toast/popToast',
      fetchOauthUrl: 'auth/fetchOauthUrl',
      saveToken: 'auth/saveToken',
      getUser: 'auth/getUser',
      getUserByToken: 'auth/getUserByToken',
    }),
    track,
    async socialiteLogin(provider) {
      this.track(`Social Login Provider Clicked: ${provider}`);
      this.loading = true;
      try {
        await axios.get('/sanctum/csrf-cookie').then((response) => {});
        const url = await this.fetchOauthUrl({ provider }).then((response) => {
          this.loading = false;
          return response;
        });
        this.window = this.openWindow(url, this.authWindowTitle);
      } catch (e) {
        this.track(
          `Social Login Provider Failed to Login: ${provider}`,
          'error',
          'auth-error',
        );
        this.popToast({
          message: 'Failed to log in.',
          timer: 10000,
          icon: 'error',
        });
        this.window.close();
        this.loading = false;
      }
    },
    async onMessage(e) {
      const self = this;
      if (e.origin !== window.origin || !e.data.token) {
        return;
      }
      self.popToast({
        message: 'Successfully logged in',
        timer: 2500,
        icon: 'success',
      });
      self.track(
        'Social Login Provider Logged in Successfully',
        'login',
        'social login success',
      );
      await axios.get('/sanctum/csrf-cookie').then((response) => {});
      await self.saveToken({ token: e.data.token }).then((response) => {
        self.getUserByToken({ token: e.data.token }).then(() => {
          setTimeout(() => {
            self.$router.push({ name: 'dashboard' });
          }, 1);
        });
      });
    },
    openWindow(url, title, options = {}) {
      if (typeof url === 'object') {
        options = url;
        url = '';
      }
      options = {
        url,
        title,
        width: 600,
        height: 720,
        ...options,
      };
      const dualScreenLeft =
        window.screenLeft !== undefined
          ? window.screenLeft
          : window.screen.left;
      const dualScreenTop =
        window.screenTop !== undefined ? window.screenTop : window.screen.top;
      const width = window.innerWidth || document.documentElement.clientWidth;
      window.screen.width;
      const height =
        window.innerHeight || document.documentElement.clientHeight;
      window.screen.height;

      options.left = width / 2 - options.width / 2 + dualScreenLeft;
      options.top = height / 2 - options.height / 2 + dualScreenTop;

      const optionsStr = Object.keys(options)
        .reduce((acc, key) => {
          acc.push(`${key}=${options[key]}`);
          return acc;
        }, [])
        .join(',');
      const newWindow = window.open(url, title, optionsStr);
      if (window.focus) {
        newWindow.focus();
      }
      return newWindow;
    },
  },
};
</script>

<style scoped></style>
<style lang="scss" scoped></style>
