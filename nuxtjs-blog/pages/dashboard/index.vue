<template>
  <div>
    <a-row :gutter="30">
      <a-col :span="12">
        <a-form
          :form="form"
          :label-col="{ span: 8 }"
          :wrapper-col="{ span: 16 }"
          @submit="handleSubmit"
        >
          <!-- Email -->
          <a-form-item label="Email">
            <a-input
              v-decorator="['email', {
                initialValue: currentUser.email
              }]"
              v-bind:disabled="true"
            />
          </a-form-item>

          <!-- Username -->
          <a-form-item label="Username">
            <a-input
              v-decorator="['user_name', {
                  initialValue: currentUser.user_name
              }]"
              v-bind:disabled="true"
            />
          </a-form-item>

          <a-form-item label="Nickname">
            <a-input
              v-decorator="['nickname', {
                  rules: [
                    { required: true, message: 'Nickname bắt buộc phải nhập!' }
                  ],
                  initialValue: currentUser.nickname
              }]"
            />
          </a-form-item>

          <a-form-item label="Họ và tên">
            <a-input
              v-decorator="['fullname', {
                  rules: [
                    { required: true, message: 'Fullname bắt buộc phải nhập!' }
                  ],
                  initialValue: fullname
              }]"
            />
          </a-form-item>

          <a-form-item label="Giới thiệu bản thân">
            <a-textarea
              v-decorator="['description', {
                initialValue: currentUser.description
              }]"
              v-bind:auto-size="{ minRows: 5 }"
            />
          </a-form-item>

          <!-- Button Submit -->
          <a-form-item :wrapper-col="{ span: 16, offset: 8 }">
            <a-button type="primary" html-type="submit">
              Cập nhật thông tin
            </a-button>
          </a-form-item>
        </a-form>
      </a-col>
      <a-col :span="12">
        <p>Tải lên ảnh đại diện</p>
        <a-upload
          name="avatar"
          list-type="picture-card"
          class="cus-avatar-uploader avatar-uploader"
          :show-upload-list="false"
          action="https://www.mocky.io/v2/5cc8019d300000980a055e76"
          :before-upload="beforeUpload"
          @change="handleChange"
        >
          <img v-if="imageUrl" :src="imageUrl" alt="avatar" />
          <div v-else>
            <a-icon :type="loading ? 'loading' : 'plus'" />
            <div class="ant-upload-text">
              Upload
            </div>
          </div>
        </a-upload>
      </a-col>
    </a-row>
  </div>
</template>

<script>
function getBase64(img, callback) {
  const reader = new FileReader();
  reader.addEventListener('load', () => callback(reader.result));
  reader.readAsDataURL(img);
}

import { mapState } from 'vuex';
export default {
  layout: 'admin',
  data() {
    return {
      loading: false,
      imageUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/220px-Image_created_with_a_mobile_phone.png',
      formLayout: 'horizontal',
      form: this.$form.createForm(this, { name: 'coordinated' }),
    };
  },
  computed: {
    ...mapState({
      currentUser: state => state.auth.currentUser
    }),
    fullname() {
      return   this.currentUser.last_name + ' ' + this.currentUser.first_name
    },
  },
  methods: {
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFields((err, values) => {
        if (!err) {
          console.log('Received values of form: ', values);
        }
      });
    },
    handleChange(info) {
      if (info.file.status === 'uploading') {
        this.loading = true;
        return;
      }
      if (info.file.status === 'done') {
        // Get this url from response in real world.
        getBase64(info.file.originFileObj, imageUrl => {
          this.imageUrl = imageUrl;
          this.loading = false;
        });
      }
    },
    beforeUpload(file) {
      const isJpgOrPng = file.type === 'image/jpeg' || file.type === 'image/png';
      if (!isJpgOrPng) {
        // this.$message.error('You can only upload JPG file!');
        this.$notification['error']({
          message: 'Có lỗi xảy ra',
          description: 'Định dạng hình ảnh không hợp lệ'
        });
      }
      const isLt2M = file.size / 1024 / 1024 < 2;
      if (!isLt2M) {
        // this.$message.error('Image must smaller than 2MB!');
        this.$notification['error']({
          message: 'Có lỗi xảy ra',
          description: 'Dung lượng hình ảnh phải nhỏ hơn 2MB'
        });
      }
      return isJpgOrPng && isLt2M;
    },
  },
}
</script>

<style>
  .cus-avatar-uploader .ant-upload.ant-upload-select-picture-card > .ant-upload {
    padding: 0px;
  }
  .cus-avatar-uploader .ant-upload.ant-upload-select-picture-card > .ant-upload img{
    width: 130px;
    height: 130px;
    object-fit: cover;
  }
  .cus-avatar-uploader .ant-upload.ant-upload-select-picture-card {
    width: 130px;
    height: 130px;
  }
</style>
