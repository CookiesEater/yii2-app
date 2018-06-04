import { shallowMount, createLocalVue } from '@vue/test-utils';
import AppHeader from '../AppHeader.vue';

const $route = {
  path: '/',
};

describe('AppHeader', () => {
  const createWrapper = (options) => {
    const localVue = createLocalVue();

    return shallowMount(AppHeader, {
      localVue,
      mocks: {
        $route,
      },
      stubs: {
        QToolbar: true,
        QToolbarTitle: true,
        QBtn: true,
        QTabs: true,
        QRouteTab: true,
      },
      ...options,
    })
  };

  it('should have 1 tab after create', () => {
    const wrapper = createWrapper();

    expect(wrapper.vm.tabs.length).toBe(1);
  });

  it('don\'t add exist path', () => {
    const wrapper = createWrapper();

    wrapper.vm.addTab($route);
    expect(wrapper.vm.tabs.length).toBe(1);
  });

  it('will be add new tab to begin', () => {
    const wrapper = createWrapper();

    wrapper.vm.addTab({ path: '/123' });
    expect(wrapper.vm.tabs[0].to).toBe('/123');
  });

  it('remove last tab if count > max', () => {
    const wrapper = createWrapper({
      propsData: {
        maxTabs: 2,
      },
    });

    wrapper.vm.addTab({ path: '/123' });
    expect(wrapper.vm.tabs.length).toBe(2);
    wrapper.vm.addTab({ path: '/345' });
    expect(wrapper.vm.tabs.length).toBe(2);
    expect(wrapper.vm.tabs[wrapper.vm.tabs.length - 1].to).toBe('/123');
  });
});
