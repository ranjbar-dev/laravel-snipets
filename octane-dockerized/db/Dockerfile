FROM mariadb:10.6

# set timezone
ENV TZ=Asia/Tehran
RUN ls /usr/share/zoneinfo && cp /usr/share/zoneinfo/Iran /etc/localtime && echo "Asia/Tehran" >  /etc/timezone