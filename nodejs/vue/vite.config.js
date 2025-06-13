import { defineConfig } from 'vite'
import vue from '@vitejs/plugin-vue'
import fs from 'node:fs'

export default defineConfig({
  plugins: [vue()],
  server: {
    host: '0.0.0.0',
    port: 3000,
    https: {
      key: fs.readFileSync('/certs/server.key'),
      cert: fs.readFileSync('/certs/server.crt')
    },
    watch: {
      usePolling: true
    }
  }
})
