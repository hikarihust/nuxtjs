<template>
  <div>
    <a-row :gutter="30">
      <a-col :span="12">
        <a-form
          :form="form"
          :label-col="{ span: 5 }"
          :wrapper-col="{ span: 12 }"
          @submit="handleSubmit"
        >
          <!-- Input -->
          <a-form-item label="Email">
            <a-input
              v-decorator="[
                'note',
                {
                  rules: [
                    { required: true, message: 'Email bắt buộc phai nhập!' }
                  ]
                }
              ]"
              v-bind:disabled="true"
            />
          </a-form-item>
          <!-- Select Box -->
          <a-form-item label="Giới tính">
            <a-select
              v-decorator="[
                'gender',
                { rules: [{ required: true, message: 'Vui lòng chọn giới tính!' }] },
              ]"
              placeholder="Chọn giới tính"
              @change="handleSelectChange"
            >
              <a-select-option value="male">
                male
              </a-select-option>
              <a-select-option value="female">
                female
              </a-select-option>
            </a-select>
          </a-form-item>
          <!-- Button Submit -->
          <a-form-item :wrapper-col="{ span: 12, offset: 5 }">
            <a-button type="primary" html-type="submit">
              Submit
            </a-button>
          </a-form-item>
        </a-form>
      </a-col>
      <a-col :span="12">
        col-12
      </a-col>
    </a-row>
  </div>
</template>

<script>
export default {
  layout: 'admin',
  data() {
    return {
      formLayout: 'horizontal',
      form: this.$form.createForm(this, { name: 'coordinated' }),
    };
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
    handleSelectChange(value) {
      console.log(value);
      this.form.setFieldsValue({
        note: `Hi, ${value === 'male' ? 'man' : 'lady'}!`,
      });
    },
  },
}
</script>

<style>

</style>
