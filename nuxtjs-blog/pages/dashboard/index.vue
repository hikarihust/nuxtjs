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
          :customRequest="handleCustomRequest"
        >
          <img v-if="getAvatar" :src="getAvatar" alt="avatar" />
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
import { mapState, mapActions } from 'vuex';
export default {
  layout: 'admin',
  data() {
    return {
      loading: false,
      formLayout: 'horizontal',
      form: this.$form.createForm(this, { name: 'coordinated' }),
      fileUpload: {
        file: null,
        base64: ''
      }
    };
  },
  computed: {
    ...mapState({
      currentUser: state => state.auth.currentUser
    }),
    fullname() {
      return   this.currentUser.last_name + ' ' + this.currentUser.first_name
    },
    getAvatar() {
      if (this.fileUpload.base64) {
        return this.fileUpload.base64;
      }
      if (this.currentUser.simple_local_avatar) {
        return this.currentUser.simple_local_avatar.full;
      }
      return ''
    }
  },
  methods: {
    ...mapActions({
      actUpdateProfile: 'auth/actUpdateProfile'
    }),
    splitFullName(fullNameStr) {
      var arrFullName = fullNameStr.split(' ').filter(str => str !== '');

      var first_name = arrFullName.pop();
      var last_name = arrFullName.join(' ');

      return {
        first_name,
        last_name
      }
    },
    handleSubmit(e) {
      e.preventDefault();
      this.form.validateFields((err, values) => {
        if (!err) {
          const { first_name, last_name } = this.splitFullName(values.fullname);
          const data = {
            file: this.fileUpload.file,
            first_name,
            last_name,
            nickname: values.nickname,
            description: values.description,
          }
          this.loading = true
          this.actUpdateProfile(data)
        }
      });
    },
    validateImages(file) {
      const isJpgOrPng = file.type === 'image/jpeg' || file.type === 'image/png';
      if (!isJpgOrPng) {
        // this.$message.error('You can only upload JPG file!');
        this.$notification['error']({
          message: 'Có lỗi xảy ra',
          description: 'Định dạng hình ảnh không hợp lệ'
        });
        return false;
      }
      const isLt2M = file.size / 1024 / 1024 < 2;
      if (!isLt2M) {
        // this.$message.error('Image must smaller than 2MB!');
        this.$notification['error']({
          message: 'Có lỗi xảy ra',
          description: 'Dung lượng hình ảnh phải nhỏ hơn 2MB'
        });
        return false;
      }
      return true;
    },
    handleCustomRequest({ file }) {
      if (this.validateImages(file) === false) {
        return;
      }

      const reader = new FileReader();
      reader.addEventListener('load', () => {
        this.fileUpload = {
          file: file,
          base64: reader.result
        }
      });
      reader.readAsDataURL(file);
    }
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
