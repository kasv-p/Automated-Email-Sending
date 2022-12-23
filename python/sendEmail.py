

# if same subject then all goes to same thread only

import smtplib
toaddr = ''
cc = []
bcc = ['bccaddr1','bccaddr2']
fromaddr = 'fromaddr'
password='apppassword'
message_subject = "hi"
message_text = "good good evening"
message = "From: %s\r\n" % fromaddr + "To: %s\r\n" % toaddr + "CC: %s\r\n" % ",".join(cc) + "Subject: %s\r\n" % message_subject + "\r\n" + message_text
toaddrs = [toaddr] + cc + bcc
server=smtplib.SMTP('smtp.gmail.com',587)
server.starttls()
server.login(fromaddr,password)
server.sendmail(fromaddr,toaddrs,message)
print('Email has been sent to ',toaddrs)
server.quit()
