<template>
  <div class="admin-layout">
    <a-layout id="components-layout-demo-custom-trigger">
      <a-layout-sider v-model="collapsed" :trigger="null" collapsible>
        <div class="logo" />
        <a-menu
          theme="dark"
          mode="inline"
          :selectedKeys="selectedKeys"
        >
          <a-menu-item key="/dashboard">
            <nuxt-link to="/dashboard">
              <a-icon type="user" />
              <span>Hồ sơ của tôi</span>
            </nuxt-link>
          </a-menu-item>
          <a-menu-item key="/dashboard/password">
            <nuxt-link to="/dashboard/password">
              <a-icon type="setting" />
              <span>Đổi mật khẩu</span>
            </nuxt-link>
          </a-menu-item>
        </a-menu>
      </a-layout-sider>
      <a-layout>
        <a-layout-header class="admin-layout__header">
          <a-icon
            class="trigger"
            :type="iconHeader"
            v-on:click="handleToggleSidebar"
          />
        </a-layout-header>
        <a-layout-content class="admin-layout__content">
          <Nuxt />
        </a-layout-content>
      </a-layout>
    </a-layout>
  </div>
</template>

<script>
import antDesignVue from '@/plugins/ant-design-vue';
export default {
  beforeCreate() {
    antDesignVue();
  },
  data() {
    return {
      collapsed: false,
    }
  },
  computed: {
    iconHeader() {
      return this.collapsed ? 'menu-unfold' : 'menu-fold';
    },
    selectedKeys() {
      return [ this.$route.path ]
    }
  },
  methods: {
    handleToggleSidebar() {
      this.collapsed = !this.collapsed;
    }
  },
}
</script>

<style>
  #components-layout-demo-custom-trigger .trigger {
    font-size: 18px;
    line-height: 64px;
    padding: 0 24px;
    cursor: pointer;
    transition: color 0.3s;
  }

  #components-layout-demo-custom-trigger .trigger:hover {
    color: #1890ff;
  }

  #components-layout-demo-custom-trigger .logo {
    height: 32px;
    background: rgba(255, 255, 255, 0.2);
    margin: 16px;
  }

  .admin-layout__content {
    margin: 24px 16px;
    padding: 24px;
    background-color: #fff;
    min-height: 280px;
  }
  .admin-layout__header {
    padding: 0;
    background-color: #fff;
  }
</style>
