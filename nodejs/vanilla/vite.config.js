// vite.config.js
import { defineConfig } from 'vite'
import fs from 'node:fs'

export default defineConfig({
  server: {
    host: '0.0.0.0',
    port: 3000,
    https: {
      key: fs.readFileSync('/certs/server.key'),
      cert: fs.readFileSync('/certs/server.crt')
    }      
  }
})
