FROM nginx:latest

# Sao chép file cấu hình Nginx tùy chỉnh (nếu cần)
COPY app.conf /etc/nginx/conf.d/app.conf

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]