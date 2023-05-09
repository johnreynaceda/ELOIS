import './bootstrap'
import Focus from '@alpinejs/focus'
import autoAnimate from '@formkit/auto-animate'
import FormsAlpinePlugin from '../../vendor/filament/forms/dist/module.esm'
import NotificationsAlpinePlugin from '../../vendor/filament/notifications/dist/module.esm'
import Alpine from 'alpinejs'
import persist from '@alpinejs/persist'

Alpine.plugin(persist)

Alpine.plugin(Focus)
Alpine.plugin(FormsAlpinePlugin)
Alpine.plugin(NotificationsAlpinePlugin)
window.Alpine = Alpine
Alpine.directive('animate', (el) => {
  autoAnimate(el)
})
window.Alpine = Alpine

Alpine.start()
