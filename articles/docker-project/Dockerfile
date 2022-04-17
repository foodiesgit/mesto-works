FROM node:14.17.5
WORKDIR /home/node/app
COPY docker-app /home/node/app
RUN npm install
CMD node server.js
EXPOSE 3000