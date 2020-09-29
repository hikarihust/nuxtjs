<template>
  <div class="long-page">
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <div class="box"></div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <div class="box"></div>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus ea placeat quis exercitationem nemo vel quam, fugit omnis at quidem odio asperiores dignissimos consequatur quod aliquid fugiat illum minima possimus?</p>
    <div class="center">
      <nuxt-link to="/scroll/another-long-page">Another Long Page</nuxt-link>
    </div>
  </div>
</template>

<script>
export default {
  transition: 'slide-left',
  data() {
    return {
      title: 'Tiêu đề bài viết',
      description: 'Hàng Ngàn Sản Phẩm Chính Hãng - Giao Và Nhận Hàng Nhanh Trong Ngày Cùng Dịch Vụ Tikinow! Tải App Tiki Ngay Để Nhận Thêm Nhiều Ưu Đãi Hấp Dẫn Mỗi Ngày! Hài Lòng Khách Hàng. Giảm Giá Cực Tốt. Uy Tín, Chất Lượng. Cam Kết Chính Hãng 100%.'
    }
  },
  head() {
    return {
      title: this.title,
      meta: [
        {
          name: 'description',
          content: this.description
        },
        {
          property: 'og:title',
          content: 'Content'
        }
      ],
      script: [
        {
          body: true,
          src: 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'
        }
      ],
    }
  }
}
</script>

<style scoped>
  .box {
    height: 100vh;
    background-color: aquamarine;
  }
  .long-page {
    padding: 50px;
  }
  .center {
    text-align: center;
    padding: 30px;
  }
</style>
