import BootstrapVue from 'bootstrap-vue';
import VueLoading from 'vuex-loading';
import { mount, createLocalVue } from '@vue/test-utils';
import ButtonLoading from '../ButtonLoading.vue';

describe('ButtonLoading', () => {
  const createWrapper = (options) => {
    const localVue = createLocalVue();
    localVue.use(BootstrapVue);
    localVue.use(VueLoading);

    return mount(ButtonLoading, {
      vueLoading: new VueLoading(),
      localVue,
      propsData: {
        loader: 'test',
      },
      ...options,
    })
  };

  it('has button', () => {
    const wrapper = createWrapper();

    expect(wrapper.find('button')).toBeTruthy();
  });

  it('has loading state', () => {
    const wrapper = createWrapper();

    expect(wrapper.find('button').attributes().disabled).toBeFalsy();
    wrapper.vm.$loading.startLoading('test');
    expect(wrapper.find('button').attributes().disabled).toBeTruthy();
  });

  it('has events', () => {
    const wrapper = createWrapper();

    wrapper.find('button').trigger('click');
    expect(wrapper.emitted().click.length).toBe(1);
  });
});
