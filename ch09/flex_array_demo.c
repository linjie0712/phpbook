#include<string.h> 
#include<stdio.h> 
#include<stdlib.h> 
  
// 简化后的 zend_string 结构体
struct zend_string 
{ 
    //hash 值
    int h; 
    // len 存储柔性数组的长度
    int len; 
    // 柔性数组，必须放在结构体的最后位置
    char val[]; //读者可以将代码修改为以下两种，看下实际运行结果
    //char val[0];
    //cahr val[1];
}; 
  
// 创建字符串
struct zend_string *createString(struct zend_string *s, 
                              long h, char val[]) 
{ 
    // 给 zeng_string 分配空间，其大小等于结构体的大小+分配字符串的大小
    s = malloc( sizeof(*s) + sizeof(char) * strlen(val)); 
  
    s->h = h; 
    s->len = strlen(val); 
    strcpy(s->val, val);   
    return s; 
} 
  
// 输出 string 详情
void printString(struct zend_string *s) 
{ 
    printf("Hash : %d\n"
           "Value : %s\n"
           "Value_Length: %d\n",
           s->h, s->val, s->len
           ); 
} 
  
// main 函数 
int main() 
{ 
    struct zend_string *s1 = createString(s1, 987782772, "Hello"); 
    struct zend_string *s2 = createString(s2, 987782766, " World!"); 
  
    printString(s1); 
    printString(s2); 
  
    printf("hash lenth: %d\n"
           "len lenth: %d\n"
        ,sizeof(s1->h),sizeof(s1->len)
        );

    // zend_string 结构体 的长度
    printf("Size of Struct zend_string: %lu\n", 
                    sizeof(struct zend_string)); 
  
    // s1 指针的长度
    printf("Size of Struct pointer: %lu\n", 
                              sizeof(s1)); 
  
    return 0; 
}