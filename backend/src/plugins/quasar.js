import Vue from 'vue';
import Quasar, {
  QLayout, QLayoutHeader, QLayoutFooter, QLayoutDrawer, QPageContainer, QPage,
  QCard, QCardTitle, QCardMain, QCardSeparator, QCardActions,
  QToolbar, QToolbarTitle,
  QTable, QTr, QTd,
  QTabs, QTab, QRouteTab, QBreadcrumbs, QBreadcrumbsEl,
  QField, QInput, QSearch,
  QBtn, QPopover,
  QCollapsible, QList, QListHeader, QItem, QItemMain, QItemSide, QItemTile, QItemSeparator,
  QScrollArea,
  QInnerLoading, QSpinnerMat, QAjaxBar,
  Dialog, Notify,
} from 'quasar-framework/dist/quasar.mat.esm';
import mdi from 'quasar-framework/icons/mdi';
import ru from 'quasar-framework/i18n/ru';

Vue.use(Quasar, {
  components: [
    QLayout, QLayoutHeader, QLayoutFooter, QLayoutDrawer, QPageContainer, QPage,
    QCard, QCardTitle, QCardMain, QCardSeparator, QCardActions,
    QToolbar, QToolbarTitle,
    QTable, QTr, QTd,
    QTabs, QTab, QRouteTab, QBreadcrumbs, QBreadcrumbsEl,
    QField, QInput, QSearch,
    QBtn, QPopover,
    QCollapsible, QList, QListHeader, QItem, QItemMain, QItemSide, QItemTile, QItemSeparator,
    QScrollArea,
    QInnerLoading, QSpinnerMat, QAjaxBar,
  ],
  plugins: [Dialog, Notify],
});
Quasar.icons.set(mdi);
Quasar.i18n.set(ru);
